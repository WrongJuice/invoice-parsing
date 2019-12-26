<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Notes;
use App\Entity\BandeDessinee;

use App\Repository\BandeDessineeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class HomeController extends AbstractController{

    public function __construct(Environment $twig)
    {

        $this->twig = $twig;

    }


    public function index():Response{

        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');

        /* Récupère les BD Recentes grâce au Repository */

        $BDTendances = $repository->getBDRecentesForHome('BD');

        /* Récupère seulement les 5 premières BD et qui ont plus de 10 notes*/

        $cinqBDTendances = [];
        $i = 0;
        foreach ($BDTendances as $BDTendance)
        {
            if($i < 5 && count($BDTendance->getSesNotes()) > 10 && $BDTendance->getNoteMoyenne() >= 4.00)
            {
                array_push($cinqBDTendances,$BDTendance);
                $i = $i + 1;
            }
        }

        /* Récupère les Mangas Tendances grâce au Repository */

        $mangasTendances = $repository->getBDRecentesForHome('Mangas');

        /* Récupère Seulement les 5 premiers Mangas ayant plus de 10 notes */

        $cinqMangasTendances = [];
        $i = 0;
        foreach ($mangasTendances as $mangaTendance)
        {

            if($i < 5 && count($mangaTendance->getSesNotes()) > 10 && $mangaTendance->getNoteMoyenne() >= 4.00)
            {
                array_push($cinqMangasTendances, $mangaTendance);
                $i = $i + 1;
            }
        }

        /* Récupère les Comics Tendances grâce au Repository */

        $comicsTendances = $repository->getBDRecentesForHome('Comics');

        /* Récupère seulement les 5 premiers Comics ayant plus de 10 notes*/
        $cinqComicsTendances = [];
        $i = 0;
        foreach ($comicsTendances as $comicTendance)
        {
            if($i < 5 && count($comicTendance->getSesNotes()) > 10 && $comicTendance->getNoteMoyenne() >= 4.00)
            {
                array_push($cinqComicsTendances, $comicTendance);
                $i = $i + 1;
            }
        }

        return $this->render('pages/home.html.twig', [
            'BDTendances' => $cinqBDTendances, 'MangasTendances' => $cinqMangasTendances, 'ComicsTendances' => $cinqComicsTendances
        ]);
    }


}


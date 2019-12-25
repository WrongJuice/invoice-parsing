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

        $CinqBDTendances = [];
        $i = 0;
        foreach ($BDTendances as $BDTendance)
        {
            if($i < 5 && count($BDTendance->getSesNotes()) > 10 && $BDTendance->getNoteMoyenne() >= 4.00)
            {
                array_push($CinqBDTendances,$BDTendance);
                $i = $i + 1;
            }
        }

        /* Récupère les Mangas Tendances grâce au Repository */

        $MangasTendances = $repository->getBDRecentesForHome('Mangas');

        /* Récupère Seulement les 5 premiers Mangas ayant plus de 10 notes */

        $CinqMangasTendances = [];
        $i = 0;
        foreach ($MangasTendances as $MangaTendance)
        {

            if($i < 5 && count($MangaTendance->getSesNotes()) > 10 && $MangaTendance->getNoteMoyenne() >= 4.00)
            {
                array_push($CinqMangasTendances, $MangaTendance);
                $i = $i + 1;
            }
        }

        /* Récupère les Comics Tendances grâce au Repository */

        $ComicsTendances = $repository->getBDRecentesForHome('Comics');

        /* Récupère seulement les 5 premiers Comics ayant plus de 10 notes*/
        $CinqComicsTendances = [];
        $i = 0;
        foreach ($ComicsTendances as $ComicTendance)
        {
            if($i < 5 && count($ComicTendance->getSesNotes()) > 10 && $ComicTendance->getNoteMoyenne() >= 4.00)
            {
                array_push($CinqComicsTendances, $ComicTendance);
                $i = $i + 1;
            }
        }

        return $this->render('pages/home.html.twig', [
            'BDTendances' => $CinqBDTendances, 'MangasTendances' => $CinqMangasTendances, 'ComicsTendances' => $CinqComicsTendances
        ]);
    }


}


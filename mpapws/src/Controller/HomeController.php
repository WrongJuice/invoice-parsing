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

        /* Récupère les BD récentes grâce au Repository */

        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');

        $BDRecentes = $repository->getBDRecentesForHome('BD');

        /* Récupère seulement les BD qui ont plus de 4 en note avec au moins 10 notes */

        $BDTendances = [];
        $i = 0;
        foreach ($BDRecentes as $BDRecente)
        {
            $Notes = $BDRecente->getSesNotes();
            list($NoteMoyenne, $nbNotes) = $BDRecente->getNoteMoyenne();
            if($NoteMoyenne >= 4 && $nbNotes > 10 && $i < 5)
            {
                array_push($BDTendances,$BDRecente);
                $i = $i + 1;
            }
        }

        $MangasRecents = $repository->getBDRecentesForHome('Mangas');
        $MangasTendances = [];
        $i = 0;
        foreach ($MangasRecents as $MangaRecent)
        {
            $Notes = $MangaRecent->getSesNotes();
            list($NoteMoyenne, $nbNotes) = $MangaRecent->getNoteMoyenne();
            if($NoteMoyenne >= 4 && $nbNotes > 10 && $i < 5)
            {
                array_push($MangasTendances, $MangaRecent);
                $i = $i + 1;
            }
        }

        $ComicsRecents = $repository->getBDRecentesForHome('Comics');
        $ComicsTendances = [];
        $i = 0;
        foreach ($ComicsRecents as $ComicRecent)
        {
            $Notes = $ComicRecent->getSesNotes();
            list($NoteMoyenne, $nbNotes) = $ComicRecent->getNoteMoyenne();
            if($NoteMoyenne >= 4 && $nbNotes > 10 && $i < 5)
            {
                array_push($ComicsTendances, $ComicRecent);
                $i = $i + 1;
            }
        }

        return $this->render('pages/home.html.twig', [
            'BDTendances' => $BDTendances, 'MangasTendances' => $MangasTendances, 'ComicsTendances' => $ComicsTendances
        ]);
    }

}


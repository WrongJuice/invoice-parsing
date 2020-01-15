<?php

namespace App\Controller;

use App\Domain\BDGenre\BDGenreHandler;
use App\Domain\BDGenre\BDGenreQuery;
use App\Domain\BDSousGenre\BDSousGenreHandler;
use App\Domain\BDSousGenre\BDSousGenreQuery;
use App\Domain\BDTendance\BDTendanceHandler;
use App\Domain\BDTendance\BDTendanceQuery;

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
use Doctrine\ORM\Tools\Pagination\Paginator;


class ListController extends AbstractController{

    public function __construct(Environment $twig)
    {

        $this->twig = $twig;

    }


    /**
     * @Route("/liste/{genre}/{page}", requirements={"page" = "\d+"}, name="listeBDGenre")
     */

    public function listeBDGenre($genre, $page, BDGenreHandler $BDGenreHandler)
    {
        /* Récupère la liste des BD selon un genre */

        /* Crée un système de pagination avec 5 BD par page */

        $nbArticlesParPage = 5;
        $bandeDessinees = $BDGenreHandler->handle(new BDGenreQuery($page, $nbArticlesParPage, $genre)); // Récupère les BD

        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($bandeDessinees) / $nbArticlesParPage),
            'nomRoute' => 'listeBDGenre',
            'paramsRoute' => array()
        );


        return $this->render('pages/liste_bd.html.twig', [
            'BandeDessinees' => $bandeDessinees,
            'GenreToString' => $genre,
            'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/liste/{genre}/Tendances/{page}", name="listeBDTendances")
     */

    public function listeBDTendances($genre, $page, BDTendanceHandler $BDTendanceHandler)
    {
        /* Récupère la liste des BD Recentes selon un genre */

        /* Crée un système de pagination avec 5 BD par page */

        $nbArticlesParPage = 5;
        $BDTendances = $BDTendanceHandler->handle(new BDTendanceQuery($page, $nbArticlesParPage, $genre)); // Récupère les BD Récentes

        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($BDTendances) / $nbArticlesParPage),
            'nomRoute' => 'listeBDTendances',
            'paramsRoute' => array()
        );


        // Permet d'afficher le genre consulté
        $genreToString = $genre;
        $genreToString .= ' Tendances';


        return $this->render('pages/liste_bd.html.twig', [
            'BandeDessinees' => $BDTendances, 'GenreToString' => $genreToString, 'genre' => $genre, 'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/liste/{genre}/{sousGenre}/{page}", name="listeBDSousGenre")
     */

    public function listeBDSousGenre($genre, $sousGenre, $page, BDSousGenreHandler $BDSousGenreHandler)
    {
        /* Récupère la liste des BD selon un genre et un sous genre */

        /* Crée un système de pagination avec 5 BD par page */

        $nbArticlesParPage = 5;
        $bandeDessinees = $BDSousGenreHandler->handle(new BDSousGenreQuery($page, $nbArticlesParPage, $genre, $sousGenre)); // Récupère les BD

        // Permet d'afficher le genre consulté
        $genreToString = $genre;
        $genreToString .= ' ';
        $genreToString .= $sousGenre;

        return $this->render('pages/liste_bd.html.twig', [
            'BandeDessinees' => $bandeDessinees, 'GenreToString' => $genreToString, 'genre' => $genre, 'sousGenre' => $sousGenre
        ]);
    }

}


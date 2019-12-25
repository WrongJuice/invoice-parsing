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
use Doctrine\ORM\Tools\Pagination\Paginator;


class ListController extends AbstractController{

    public function __construct(Environment $twig)
    {

        $this->twig = $twig;

    }


    /**
     * @Route("/listeBD/{genre}/{page}", requirements={"page" = "\d+"}, name="listeBDGenre")
     */

    public function listeBDGenre($genre, $page)
    {
        /* Récupère la liste des BD selon un genre */

        /* Crée un système de pagination avec 5 BD par page */

        $nbArticlesParPage = 5;
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');
        $BandeDessinees = $repository->getBDGenrePagination($page, $nbArticlesParPage, $genre);

        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($BandeDessinees) / $nbArticlesParPage),
            'nomRoute' => 'listeBDGenre',
            'paramsRoute' => array()
        );


        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BandeDessinees,
            'GenreToString' => $genre,
            'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/listeBD/{genre}/Tendances/{page}", name="listeBDTendances")
     */

    public function listeBDTendances($genre, $page)
    {
        /* Récupère la liste des BD Recentes selon un genre */

        /* Crée un système de pagination avec 5 BD par page */

        $nbMaxParPage = 5;

        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');
        $nbArticlesParPage = 5;
        $BDRecentes = $repository->getBDRecentesPagination($page, $nbArticlesParPage, $genre); // Récupère les BD Récentes

        $BDTendances = [];
        foreach($BDRecentes as $BDRecente){
            if(count($BDRecente->getSesNotes()) > 10 && $BDRecente->getNoteMoyenne() >= 4.00){
                array_push($BDTendances, $BDRecente);
            }
        }

        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($BDTendances) / $nbArticlesParPage),
            'nomRoute' => 'listeBDTendances',
            'paramsRoute' => array()
        );


        // Permet d'afficher le genre consulté
        $genreToString = $genre;
        $genreToString .= ' Tendances';


        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BDTendances, 'GenreToString' => $genreToString, 'genre' => $genre, 'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/listeBD/{genre}/{sousGenre}/{page}", name="listeBDSousGenre")
     */

    public function listeBDSousGenre($genre, $sousGenre, $page)
    {
        /* Récupère la liste des BD selon un genre et un sous genre */

        /* Crée un système de pagination avec 5 BD par page */

        $nbArticlesParPage = 5;
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');
        $BandeDessinees = $repository->getBDSousGenrePagination($page, $nbArticlesParPage, $genre, $sousGenre);

        // Permet d'afficher le genre consulté
        $genreToString = $genre;
        $genreToString .= ' ';
        $genreToString .= $sousGenre;

        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BandeDessinees, 'GenreToString' => $genreToString, 'genre' => $genre, 'sousGenre' => $sousGenre
        ]);
    }

}


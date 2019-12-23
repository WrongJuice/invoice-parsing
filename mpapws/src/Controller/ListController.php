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

        $nbArticlesParPage = 5;
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');
        $BandeDessinees = $repository->findAllPagineEtTrieGenre($page, $nbArticlesParPage, $genre);

        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($BandeDessinees) / $nbArticlesParPage),
            'nomRoute' => 'listeBDGenre',
            'paramsRoute' => array()
        );

        /* Récupère les notes moyennes des BD */
        $notesMoyennes = [];
        foreach ($BandeDessinees as $bandeDessinee) {
            $notes = $bandeDessinee->getSesNotes();
            list($noteMoyenne, $nbNotes) = $bandeDessinee->getNoteMoyenne();
            array_push($notesMoyennes, $noteMoyenne);
        }



        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BandeDessinees,
            'NotesMoyennes' => $notesMoyennes, 'GenreConsulte' => $genre,
            'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/listeBD/{genre}/Tendances/{page}", name="listeBDTendances")
     */

    public function listeBDTendances($genre, $page)
    {
        /* Récupère la liste des BD tendances selon un genre */

        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');

        $nbArticlesParPage = 5;
        $BDRecentes = $repository->getBDRecentesPagination($page, $nbArticlesParPage, $genre); // Récupère les BD Récentes

        $BDTendances = [];
        foreach ($BDRecentes as $BDRecente) // Récupère seulement les BD Récentes avec plus de 10 notes et une moyenne de note supérieure ou égale à 4
        {
            $Notes = $BDRecente->getSesNotes();
            list($NoteMoyenne, $nbNotes) = $BDRecente->getNoteMoyenne();
            if($NoteMoyenne >= 4 && $nbNotes > 10)
            {
                array_push($BDTendances,$BDRecente);
            }
        }

        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($BDTendances) / $nbArticlesParPage),
            'nomRoute' => 'listeBDTendances',
            'paramsRoute' => array()
        );


        /* Récupère la note moyenne des BD */
        $notesMoyennes = [];
        foreach ($BDRecentes as $bandeDessinee) { // Récupère les notes moyennes de chaque BD
            $notes = $bandeDessinee->getSesNotes();
            list($noteMoyenne, $nbNotes) = $bandeDessinee->getNoteMoyenne();
            array_push($notesMoyennes, $noteMoyenne);
        }

        // Permet d'afficher le genre consulté
        $genreConsulté = $genre;
        $genreConsulté .= ' Tendances';

        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BDRecentes, 'NotesMoyennes' => $notesMoyennes, 'GenreConsulte' => $genreConsulté, 'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/listeBD/{genre}/{sousGenre}", name="listeBDSousGenre")
     */

    public function listeBDSousGenre($genre, $sousGenre)
    {
        /* Récupère la liste des BD selon un genre et un sous genre */

        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');
        $BandeDessinees = $repository->findBy(array('Genre' => $genre, 'SousGenre' => $sousGenre));

        $notesMoyennes = [];

        foreach ($BandeDessinees as $bandeDessinee) {
            $notes = $bandeDessinee->getSesNotes();
            list($noteMoyenne, $nbNotes) = $bandeDessinee->getNoteMoyenne();
            array_push($notesMoyennes, $noteMoyenne);
        }

        // Permet d'afficher le genre consulté
        $genreConsulté = $genre;
        $genreConsulté .= ' ';
        $genreConsulté .= $sousGenre;

        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BandeDessinees, 'NotesMoyennes' => $notesMoyennes, 'GenreConsulte' => $genreConsulté
        ]);
    }

}


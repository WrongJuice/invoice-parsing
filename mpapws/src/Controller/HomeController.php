<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\QueryBuilder;

class HomeController extends AbstractController{

    public function __construct(Environment $twig)
    {

        $this->twig = $twig;

    }


    public function index():Response{

        /* Récupère les BD récentes grâce au Repository */

        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');

        $BDRecentes = $repository->getBDRecentes('BD');

        /* Récupère seulement les BD qui ont plus de 4 en note avec au moins 10 notes */

        $BDTendances = [];
        $i = 0;
        foreach ($BDRecentes as $BDRecente)
        {
            $Notes = $BDRecente->getSesNotes();
            list($NoteMoyenne, $nbNotes) = $this->getNoteMoyenne($Notes);
            if($NoteMoyenne >= 4 && $nbNotes > 10 && $i < 5)
            {
                array_push($BDTendances,$BDRecente);
                $i = $i + 1;
            }
        }

        $MangasRecents = $repository->getBDRecentes('Mangas');
        $MangasTendances = [];
        $i = 0;
        foreach ($MangasRecents as $MangaRecent)
        {
            $Notes = $MangaRecent->getSesNotes();
            list($NoteMoyenne, $nbNotes) = $this->getNoteMoyenne($Notes);
            if($NoteMoyenne >= 4 && $nbNotes > 10 && $i < 5)
            {
                array_push($MangasTendances, $MangaRecent);
                $i = $i + 1;
            }
        }

        $ComicsRecents = $repository->getBDRecentes('Comics');
        $ComicsTendances = [];
        $i = 0;
        foreach ($ComicsRecents as $ComicRecent)
        {
            $Notes = $ComicRecent->getSesNotes();
            list($NoteMoyenne, $nbNotes) = $this->getNoteMoyenne($Notes);
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


    /**
     * @Route("/listeBD/{genre}", name="listeBDGenre")
     */

    public function listeBDGenre($genre)
    {
        /* Récupère la liste des BD selon un genre */
        
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');
        $BandeDessinees = $repository->findBy(array('Genre' => $genre));
        $notesMoyennes = [];

        foreach ($BandeDessinees as $bandeDessinee) {
            $notes = $bandeDessinee->getSesNotes();
            list($noteMoyenne, $nbNotes) = $this->getNoteMoyenne($notes);
            array_push($notesMoyennes, $noteMoyenne);
        }

        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BandeDessinees,
            'NotesMoyennes' => $notesMoyennes
        ]);
    }

    /**
     * @Route("/listeBD/{genre}/Tendances", name="listeBDTendances")
     */

    public function listeBDTendances($genre)
    {
        /* Récupère la liste des BD tendances selon un genre */

        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');

        $BDRecentes = $repository->getBDRecentes($genre);
        $BDTendances = [];
        foreach ($BDRecentes as $BDRecente)
        {
            $Notes = $BDRecente->getSesNotes();
            list($NoteMoyenne, $nbNotes) = $this->getNoteMoyenne($Notes);
            if($NoteMoyenne >= 4 && $nbNotes > 10)
            {
                array_push($BDTendances,$BDRecente);
            }
        }

        return $this->render('pages/listeBDTendances.html.twig', [
            'BDTendances' => $BDTendances
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
        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BandeDessinees
        ]);
    }




    /**
     * @Route("/BD/{id}/", name="BDDetaillee")
     */

    public function BDDetaillee($id)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');
        $BandeDessinee = $repository->find($id);
        $Commentaires = $BandeDessinee->getSesCommentaires();
        $Notes = $BandeDessinee->getSesNotes();

        $Planches = [];

        /* Ajoute les planches seulement si elles existent */

        if($BandeDessinee->getPlanche1()){
            array_push($Planches, $BandeDessinee->getPlanche1());
        }

        if($BandeDessinee->getPlanche2()){
            array_push($Planches, $BandeDessinee->getPlanche2());
        }

        if($BandeDessinee->getPlanche3()){
            array_push($Planches, $BandeDessinee->getPlanche3());
        }

        if($BandeDessinee->getPlanche4()){
            array_push($Planches, $BandeDessinee->getPlanche4());
        }

        if($BandeDessinee->getPlanche5()){
            array_push($Planches, $BandeDessinee->getPlanche5());
        }

        list($NoteMoyenne, $nbNotes) = $this->getNoteMoyenne($Notes); /* Récupère la note moyenne d'une BD et son nombre de notes */

        return $this->render('pages/BDDetaillee.html.twig', [
            'BandeDessinee' => $BandeDessinee, 'Commentaires' => $Commentaires, 'Note' => $NoteMoyenne, 'Planches' => $Planches
        ]);
    }

    public function getNoteMoyenne($Notes){

        /* Fonction qui récupère une note moyenne à partir d'une liste de notes */

        $NoteMoyenne = 0;
        $i = 0;

        foreach($Notes as $Note)
        {
            $NoteMoyenne += $Note->getValeur();
            $i++;
        }
        $NoteMoyenne = $NoteMoyenne / $i;

        return array($NoteMoyenne, $i);
    }

}


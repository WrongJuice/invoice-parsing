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

        /* Une fois les BD récentes récupérées, Trie parmi ces BD les notes moyennes > 4 */

        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');

        $BDRecentes = $repository->getBDRecentes('BD');
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
        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');
        $BandeDessinees = $repository->findBy(array('Genre' => $genre));
        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BandeDessinees
        ]);
    }

    /**
     * @Route("/listeBD/{genre}/Tendances", name="listeBDTendances")
     */

    public function listeBDTendances($genre)
    {
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

        list($NoteMoyenne, $nbNotes) = $this->getNoteMoyenne($Notes);

        return $this->render('pages/BDDetaillee.html.twig', [
            'BandeDessinee' => $BandeDessinee, 'Commentaires' => $Commentaires, 'Note' => $NoteMoyenne
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


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

        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');

        $now = new \DateTime();

        $BDTendances = $repository->getBDRecentes('BD');

        $BDTendances2 = [];

        foreach ($BDTendances as $BDTendance)
        {
            $NoteMoyenne = 0;
            $i = 0;
            $Notes = $BDTendance->getSesNotes();
            foreach($Notes as $Note)
            {
                $NoteMoyenne += $Note->getValeur();
                $i++;
            }
            $NoteMoyenne = $NoteMoyenne / $i;
            if($NoteMoyenne >= 4)
            {
                array_push($BDTendances2, $BDTendance);
            }

        }

        $MangasTendances = $repository->getBDRecentes('Mangas');
        $ComicsTendances = $repository->getBDRecentes('Comics');

        return $this->render('pages/home.html.twig', [
            'BDTendances' => $BDTendances2, 'MangasTendances' => $MangasTendances, 'ComicsTendances' => $ComicsTendances
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

        $NoteMoyenne = 0;
        $i = 0;
        foreach ($Notes as $Note)
        {
            $NoteMoyenne += $Note->getValeur();
            $i++;
        }
        $NoteMoyenne = $NoteMoyenne / $i;
        return $this->render('pages/BDDetaillee.html.twig', [
            'BandeDessinee' => $BandeDessinee, 'Commentaires' => $Commentaires, 'Note' => $NoteMoyenne, 'Notes' => $Notes
        ]);
    }
}
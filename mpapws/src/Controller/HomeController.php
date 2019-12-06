<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{

    public function __construct(Environment $twig)
    {

        $this->twig = $twig;

    }

    public function index():Response{

        return new Response($this->twig->render('pages/home.html.twig'));

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
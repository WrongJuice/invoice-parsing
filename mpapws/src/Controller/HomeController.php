<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
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

        /* Récupère les notes moyennes des BD */
        $notesMoyennes = [];
        foreach ($BandeDessinees as $bandeDessinee) {
            $notes = $bandeDessinee->getSesNotes();
            list($noteMoyenne, $nbNotes) = $this->getNoteMoyenne($notes);
            array_push($notesMoyennes, $noteMoyenne);
        }

        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BandeDessinees,
            'NotesMoyennes' => $notesMoyennes, 'GenreConsulte' => $genre
        ]);
    }

    /**
     * @Route("/listeBD/{genre}/Tendances", name="listeBDTendances")
     */

    public function listeBDTendances($genre)
    {
        /* Récupère la liste des BD tendances selon un genre */

        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');

        $BDRecentes = $repository->getBDRecentes($genre); // Récupère les BD Récentes
        $BDTendances = [];
        foreach ($BDRecentes as $BDRecente) // Récupère seulement les BD Récentes avec plus de 10 notes et une moyenne de note supérieure ou égale à 4
        {
            $Notes = $BDRecente->getSesNotes();
            list($NoteMoyenne, $nbNotes) = $this->getNoteMoyenne($Notes);
            if($NoteMoyenne >= 4 && $nbNotes > 10)
            {
                array_push($BDTendances,$BDRecente);
            }
        }

        /* Récupère la note moyenne des BD */
        $notesMoyennes = [];
        foreach ($BDTendances as $bandeDessinee) { // Récupère les notes moyennes de chaque BD
            $notes = $bandeDessinee->getSesNotes();
            list($noteMoyenne, $nbNotes) = $this->getNoteMoyenne($notes);
            array_push($notesMoyennes, $noteMoyenne);
        }

        // Permet d'afficher le genre consulté
        $genreConsulté = $genre;
        $genreConsulté .= ' Tendances';

        return $this->render('pages/listeBD.html.twig', [
            'BandeDessinees' => $BDTendances, 'NotesMoyennes' => $notesMoyennes, 'GenreConsulte' => $genreConsulté
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
            list($noteMoyenne, $nbNotes) = $this->getNoteMoyenne($notes);
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

    /**
     * @Route("/formulaire", name="formulaire")
     */

    public function formulaire(Request $request, EntityManagerInterface $entityManager){

        // On créé notre BD
        $BD = new BandeDessinee();

        // On créé notre FormBuilder et on lui ajoute directement les champs
        $form = $this->createFormBuilder($BD)
            ->add('titre', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $BD = $form->getData();
            dump($BD);

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager->persist($BD);
            $entityManager->flush();

            //return $this->redirectToRoute('task_success');
        }
        return $this->render('pages/formulaire.html.twig', [
            'form'=> $form->createView(),
        ]);

    }

}


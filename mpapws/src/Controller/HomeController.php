<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Notes;
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
use App\Entity\BandeDessinee;

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
        $BandeDessinees = $repository->findBy(array('Genre' => $genre), array('DateDeParution', 'DESC'));

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

    public function BDDetaillee($id, Request $request, EntityManagerInterface $entityManager)
    {
        /*Récupère les infos de la BD */

        $repository = $this->getDoctrine()->getManager()->getRepository('App\Entity\BandeDessinee');
        $BandeDessinee = $repository->find($id);
        $Commentaires = $BandeDessinee->getSesCommentaires();
        $Notes = $BandeDessinee->getSesNotes();

        /* Ajoute les planches seulement si elles existent */

        $Planches = [];

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
        $nbCommentaires = $this->getNbCommentaires($BandeDessinee);

        /* On s'occupe du formulaire d'envoi de commentaires */

        $Commentaire = new Commentaire();
        $Commentaire->setSaBandeDessinee($BandeDessinee);
        $Commentaire->setDate(new \DateTime('now'));

        $formComment = $this->createFormBuilder($Commentaire)
            ->add('Auteur', TextType::class,['attr' => ['placeholder' => 'Pseudonyme',]])
            ->add('Contenu', TextareaType::class, ['attr' => ['placeholder' => 'Ajouter un commentaire public...',]])
            ->add('save', SubmitType::class, ['label'  => 'Valider',])
            ->getForm();

        $formComment->handleRequest($request);

        /* Si le commentaire est envoyé, recharge la page */
        if ($formComment->isSubmitted() && $formComment->isValid()) {


            $Commentaire = $formComment->getData();
            dump($Commentaire);

            $entityManager->persist($Commentaire);
            $entityManager->flush();

            return $this->redirectToRoute('BDDetaillee', ['id' => $BandeDessinee->getId()]);
        }

        /* On s'occupe du formulaire d'envoi de note */

        $Note = new Notes();
        $Note->setSaBandeDessinee($BandeDessinee);

        $formNote = $this->createFormBuilder($Note)
            ->add('Valeur', ChoiceType::class, [
                'choices' => [0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4',
                    5  =>'5'],],['choice-label' => 'Ajouter une note',], ['placeholder' => 'Salut'])
            ->add('save', SubmitType::class, ['label'  => 'Valider',])
            ->getForm();

        $formNote->handleRequest($request);

        /* Si la note envoyé, recharge la page */
        if ($formNote->isSubmitted() && $formNote->isValid()) {


            $Note = $formNote->getData();
            dump($Note);

            $entityManager->persist($Note);
            $entityManager->flush();

            return $this->redirectToRoute('BDDetaillee', ['id' => $BandeDessinee->getId()]);
        }

        return $this->render('pages/BDDetaillee.html.twig', [
            'formComment'=> $formComment->createView(), 'formNote'=> $formNote->createView(), 'BandeDessinee' => $BandeDessinee, 'Commentaires' => $Commentaires, 'nbCommentaires' => $nbCommentaires, 'Note' => $NoteMoyenne, 'nbNotes' => $nbNotes,'Planches' => $Planches
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
        $NoteMoyenne = number_format($NoteMoyenne, 2, ',', ' ');

        return array($NoteMoyenne, $i);
    }

    public function getNbCommentaires($BandeDessinee){

        /* Fonction qui récupère le nombre de commentaires pour une BD */

        $Commentaires = $BandeDessinee->getSesCommentaires();
        $nbCommentaires = 0;

        foreach($Commentaires as $Commentaire)
        {
            $nbCommentaires += 1;
        }

        return $nbCommentaires;
    }

    /**
     * @Route("/formulaire", name="formulaire")
     */

    public function formulaire(Request $request, EntityManagerInterface $entityManager){

        // On créé notre BD
        $BD = new BandeDessinee();
        $BD->setDateDeParution(new \DateTime('now'));

        // On créé notre FormBuilder et on lui ajoute directement les champs
        $form = $this->createFormBuilder($BD)
            ->add('titre', TextType::class,['label'  => 'Titre du livre',])
            ->add('auteur', TextType::class, ['label'  => 'Auteur',])
            ->add('description', TextType::class,['label'  => 'Description',])
            ->add('genre', ChoiceType::class, [
                'choices' => ['Bande dessinée' => 'BD', 'Comic' => 'Comics', 'Manga' => 'Mangas'],], ['label'  => 'Genre',])
            ->add('sousGenre', ChoiceType::class, [
                'choices' => ['Aventure' => 'Aventure', 'Humour' => 'Humour', 'Super-Héros' => 'Super-Héros', 'Policier' => 'Policier', 'Science-Fiction' => 'Science-Fiction',
                    'Historique'=>'Historique', 'Fantaisy' => 'Fantaisy', 'Divers' => 'Divers' ],], ['label'  => 'Sous-genre',])
            ->add('LivrePDF', FileType::class, ['label'  => 'Livre au format PDF',])
            ->add('Planche1', FileType::class, ['label'  => 'Planche 1',])
            ->add('Planche2', FileType::class, ['label'  => 'Planche 2',])
            ->add('Planche3', FileType::class, ['label'  => 'Planche 3',])
            ->add('Planche4', FileType::class, ['label'  => 'Planche 4',])
            ->add('Planche5', FileType::class, ['label'  => 'Planche 5',])
            ->add('Affiche', FileType::class, ['label'  => 'Affiche du livre',])
            ->add('save', SubmitType::class, ['label'  => 'Envoyer !',])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $BD = $form->getData();
            dump($BD); // Pour les tests ! A enlever plus tard !

            $entityManager->persist($BD);
            $entityManager->flush();

            return $this->redirectToRoute('task_success.html.twig');
        }
        return $this->render('pages/formulaire.html.twig', [
            'form'=> $form->createView(),
        ]);

    }

}


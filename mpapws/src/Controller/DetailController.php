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


class DetailController extends AbstractController{

    public function __construct(Environment $twig)
    {

        $this->twig = $twig;

    }

    /**
     * @Route("/BD/{BandeDessinee}/", name="BDDetaillee")
     */

    public function BDDetaillee(BandeDessinee $BandeDessinee, Request $request, EntityManagerInterface $entityManager, BandeDessineeRepository $repository)
    {
        /*Récupère les infos de la BD */

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

        list($NoteMoyenne, $nbNotes) = $BandeDessinee->getNoteMoyenne(); /* Récupère la note moyenne d'une BD et son nombre de notes */
        $nbCommentaires = $BandeDessinee->getNbCommentaires();

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

            return $this->redirectToRoute('BDDetaillee', ['BandeDessinee' => $BandeDessinee->getId()]);
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

            return $this->redirectToRoute('BDDetaillee', ['BandeDessinee' => $BandeDessinee->getId()]);
        }

        return $this->render('pages/BDDetaillee.html.twig', [
            'formComment'=> $formComment->createView(), 'formNote'=> $formNote->createView(), 'BandeDessinee' => $BandeDessinee, 'Commentaires' => $Commentaires, 'nbCommentaires' => $nbCommentaires, 'Note' => $NoteMoyenne, 'nbNotes' => $nbNotes,'Planches' => $Planches
        ]);
    }


}


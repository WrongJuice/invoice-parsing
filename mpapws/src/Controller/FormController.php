<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Notes;
use App\Entity\BandeDessinee;

use App\Repository\BandeDessineeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Imagick;
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
use Symfony\Component\Validator\Constraints\File;


class FormController extends AbstractController{

    public function __construct(Environment $twig)
    {

        $this->twig = $twig;

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
            ->add('LivrePDF', FileType::class, ['label'  => 'Livre au format PDF (Taille maximum autorisée : 100mo)', 'mapped' => false, 'required' => false, 'constraints' => [
                new File([
                    'maxSize' => '100M',
                    'mimeTypes' => [ 'application/pdf', 'application/x-pdf'],
                    'mimeTypesMessage' => 'Nan mais sérieux quoi, veuillez uploader un fichier pdf valide !',
                    'uploadIniSizeErrorMessage' => 'Votre BD dépasse la taille maximum autorisée, veuillez faire un tome 2 et uploader un fichier plus léger !',
                    'uploadFormSizeErrorMessage' => 'Votre BD dépasse la taille maximum autorisée, veuillez faire un tome 2 et uploader un fichier plus léger !'])
                ]
            ])
            /*
            ->add('Affiche', FileType::class, ['label'  => 'Affiche du livre','mapped' => false])
            ->add('Planche1', FileType::class, ['label'  => 'Planche 1 (Optionnel)', 'required' => false, 'mapped' => false])
            ->add('Planche2', FileType::class, ['label'  => 'Planche 2 (Optionnel)', 'required' => false, 'mapped' => false])
            ->add('Planche3', FileType::class, ['label'  => 'Planche 3 (Optionnel)', 'required' => false, 'mapped' => false])
            ->add('Planche4', FileType::class, ['label'  => 'Planche 4 (Optionnel)', 'required' => false, 'mapped' => false])
            ->add('Planche5', FileType::class, ['label'  => 'Planche 5 (Optionnel)', 'required' => false, 'mapped' => false])
            ->add('Planche5', FileType::class, ['label'  => 'Planche 5 (Optionnel)', 'required' => false, 'mapped' => false])
            */
            ->add('save', SubmitType::class, ['label'  => 'Envoyer !',])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $BD = $form->getData();

            dump($BD);

            $entityManager->persist($BD);
            $entityManager->flush();

            $uploadedPDF = ($form['LivrePDF']->getData());
            $destination = $this->getParameter('kernel.project_dir').'/public/data/' . $BD->getId();

            $imagick = new Imagick();



            echo 'DEBUG -> id de la BD ajoutée ->' . $BD->getId() . ' + Le nom du fichier -> ' . $uploadedPDF->getClientOriginalName();

            $filename = pathinfo($uploadedPDF->getClientOriginalName() . '.pdf' , PATHINFO_FILENAME);
            $uploadedPDF->move($destination , $filename);
            rename('./data/' . $BD->getId() . '/' . $uploadedPDF->getClientOriginalName() , './data/' . $BD->getId() .'/livre.pdf');

            //Décomposition du pdf
            $imagick = new Imagick();
            $bookPath = './data/' . $BD->getId() .'/livre.pdf';
            $imagick->readImage($bookPath . '[0]');


            //exec("convert './data/' . $BD->getId() .'/livre.pdf'[0] './data/' . $BD->getId() .'/affiche.jpg';
            return $this->render('pages/task_success.html.twig', [
                'BandeDessinee'=> $BD,
            ]);
        }
        return $this->render('pages/formulaire.html.twig', [
            'form'=> $form->createView(),
        ]);

    }

}


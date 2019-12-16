<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\BandeDessinee;
use App\Entity\Commentaire;
use App\Entity\Notes;

class AppFixturesSprint1 extends Fixture
{
    public function load(ObjectManager $manager)
    {

        /* ----------------------LES BD --------------------------*/

        // Crée 1 BD de Science Fiction Tendance
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('La marche sur la Lune');
            $BandeDessinee->setDescription("Vivez l'aventure de Tom qui part essayer de marcher sur la lune avec ses amis ! Je m'appelle Jean-Jacques Mulusson sur mon Tipee");
            $BandeDessinee->setAuteur('Jean-Jacques Molusson');
            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
            $BandeDessinee->setGenre('BD');
            $BandeDessinee->setSousGenre('Aventure');
            $BandeDessinee->setAffiche('/revue/affiche_BD1.jpg');
            $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
            $BandeDessinee->setPlanche1('/revue/planche_BD1.jpg');
            $BandeDessinee->setPlanche2('/revue/planche_BD2.jpg');
            $BandeDessinee->setPlanche3('/revue/planche_BD3.jpg');
            $BandeDessinee->setPlanche4('/revue/planche_BD4.jpg');
            $BandeDessinee->setPlanche5('/revue/planche_BD5.jpg');

            $manager->persist($BandeDessinee);

              // Crée 3 commentaires pour la BD et les lie
            $commentaire= new Commentaire();
            $commentaire->setAuteur('Daniel');
            $commentaire->setContenu('Super BD ca !');
            $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
            $commentaire->setSaBandeDessinee($BandeDessinee);
            $manager->persist($commentaire);

            $commentaire= new Commentaire();
            $commentaire->setAuteur('Jean Jacques Mulusson');
            $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
            $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
            $commentaire->setSaBandeDessinee($BandeDessinee);
            $manager->persist($commentaire);

            $commentaire= new Commentaire();
            $commentaire->setAuteur('Eric ');
            $commentaire->setContenu('Enorme le concept d aller sur la lune xd');
            $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
            $commentaire->setSaBandeDessinee($BandeDessinee);
            $manager->persist($commentaire);


              // Crée 10 notes pour la BD et les lie
            for($y = 0; $y < 15; $y++) {
                $note = new Notes();
                $note->setValeur(5);
                $note->setSaBandeDessinee($BandeDessinee);
                $manager->persist($note);
            }


        // Crée 1 BD Fantasy trop vieille
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Gnomes');
        $BandeDessinee->setDescription("Ceci est ma première BD soyez simpa, c'est l'histoire de deux petits gnomes en quête d'un trésor");
        $BandeDessinee->setAuteur('Diego le dessinateur');
        $BandeDessinee->setDateDeParution(new \DateTime('2019-05-05 00:00:00'));
        $BandeDessinee->setGenre('BD');
        $BandeDessinee->setSousGenre('Fantasy');
        $BandeDessinee->setAffiche('/revue/affiche_BD2.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_BD1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_BD2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_BD3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_BD4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_BD5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jérome');
        $commentaire->setContenu('Pas trop mal');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Titiana la liseuse');
        $commentaire->setContenu(  " j'm bcp le dessin");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jojo le zozo ');
        $commentaire->setContenu("kil son moche ces petits gnomes");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 4; $y++){
            $note = new Notes();
            $note->setValeur(4);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }
        for($y = 0; $y < 5; $y++){
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 BD Historique qui n'a pas assez de notes
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('2nd Guerre Mondiale');
        $BandeDessinee->setDescription("Henry est un soldat français ayant vécu les deux guerres mondiales, découvrez sa rencontre avec un soldat Italien pas comme les autres... Mon Tipee : www.tipee/Henry.com");
        $BandeDessinee->setAuteur('Henry Lamoelle');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('BD');
        $BandeDessinee->setSousGenre('Historique');
        $BandeDessinee->setAffiche('/revue/affiche_BD3.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_BD1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_BD2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_BD3.jpg');

        $manager->persist($BandeDessinee);

        // Crée 8 notes pour la BD et les lie
        for($y = 0; $y < 7; $y++){
            $note = new Notes();
            $note->setValeur(4.3);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 BD Divers qui a de trop mauvaises notes
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Tattoo Passion');
        $BandeDessinee->setDescription("Jadore les tatto lisez ma bd");
        $BandeDessinee->setAuteur('EvelynnTatoo');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('BD');
        $BandeDessinee->setSousGenre('Divers');
        $BandeDessinee->setAffiche('/revue/affiche_BD4.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');

        $manager->persist($BandeDessinee);

        // Crée 1 commentaire pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('jmLesTatoo');
        $commentaire->setContenu('pas ouf comme BD de tatoo...');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 20; $y++){
            $note = new Notes();
            $note->setValeur(1);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

         //Crée 1 BD humour Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Totoche');
        $BandeDessinee->setDescription("Voici les aventures foloches de Totoche");
        $BandeDessinee->setAuteur('Lucien Monera');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('BD');
        $BandeDessinee->setSousGenre('Humour');
        $BandeDessinee->setAffiche('/revue/affiche_BD5.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_BD1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_BD2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_BD3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_BD4.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super BD ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Enorme le concept d aller sur la lune xd');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 BD d'Humour Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Les Profs');
        $BandeDessinee->setDescription("Ca te rappellera l'époque du collège");
        $BandeDessinee->setAuteur('Michel Pierre');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('BD');
        $BandeDessinee->setSousGenre('Humour');
        $BandeDessinee->setAffiche('/revue/affiche_BD6.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_BD1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_BD2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_BD3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_BD4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_BD5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super BD ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Vraiment super, j adore aussi je lache un 5 etoiles !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 BD d'Humour Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Gaston');
        $BandeDessinee->setDescription("Gaston (pas le hérisson)");
        $BandeDessinee->setAuteur('Stephan Namaspamousse');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('BD');
        $BandeDessinee->setSousGenre('Humour');
        $BandeDessinee->setAffiche('/revue/affiche_BD7.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_BD1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_BD2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_BD3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_BD4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_BD5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super BD ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Vraiment super, j adore aussi je lache un 5 etoiles !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 BD d'Humour Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Les Policiers');
        $BandeDessinee->setDescription("Tout est dans le titre.");
        $BandeDessinee->setAuteur('Le comissaire');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('BD');
        $BandeDessinee->setSousGenre('Policier');
        $BandeDessinee->setAffiche('/revue/affiche_BD8.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_BD1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_BD2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_BD3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_BD4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_BD5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super BD ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Vraiment super, j adore aussi je lache un 5 etoiles !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        /* ----------------------LES MANGAS --------------------------*/

        // Crée 1 Manga d'Aventure Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Fairy Tail Zero');
        $BandeDessinee->setDescription("On y suit en particulier l'histoire d'une petite fille nommée Mavis Vermillon. Son aventure l’amènera à fonder Fairy Tail, une guilde de mages tapageurs et bien connues quelques décennies plus tard.");
        $BandeDessinee->setAuteur('Hiro Mashima');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Mangas');
        $BandeDessinee->setSousGenre('Aventure');
        $BandeDessinee->setAffiche('/revue/affiche_Manga1.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Manga1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Manga2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Manga3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Manga4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_Manga5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Manga ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }


        // Crée 1 Manga Fantasy trop vieux
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Strike the Blood');
        $BandeDessinee->setDescription("Strike the Blood parle des aventures du jeune Kojo Akatsuki, qui n'est autre que le vampire le plus puissant du monde. L'histoire se passe dans un milieu scolaire.");
        $BandeDessinee->setAuteur('Gakuto Mikumo');
        $BandeDessinee->setDateDeParution(new \DateTime('2019-05-05 00:00:00'));
        $BandeDessinee->setGenre('Mangas');
        $BandeDessinee->setSousGenre('Fantasy');
        $BandeDessinee->setAffiche('/revue/affiche_Manga2.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Manga1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Manga2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Manga3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Manga4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_Manga5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jérome');
        $commentaire->setContenu('Pas trop mal');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Titiana la liseuse');
        $commentaire->setContenu(  " j'm bcp le dessin");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jojo le zozo ');
        $commentaire->setContenu("zaime po sa tete");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 4; $y++){
            $note = new Notes();
            $note->setValeur(4);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }
        for($y = 0; $y < 4; $y++){
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Manga Historique qui n'a pas assez de notes
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('La Rose de Versailles');
        $BandeDessinee->setDescription("Lady Oscar fille du général de Jarjayes vint au monde en 1755 en même temps que la future reine de France Marie-Antoinette d'Autriche...");
        $BandeDessinee->setAuteur('Riyoko Ikeda');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Mangas');
        $BandeDessinee->setSousGenre('Historique');
        $BandeDessinee->setAffiche('/revue/affiche_Manga3.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Manga1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Manga2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Manga3.jpg');

        $manager->persist($BandeDessinee);

        // Crée 8 notes pour le Manga et les lie
        for($y = 0; $y < 7; $y++){
            $note = new Notes();
            $note->setValeur(4.3);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Manga Divers qui a de trop mauvaises notes
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Rainbow 6');
        $BandeDessinee->setDescription("C'est pas le jeu mdr, mais c'est tout aussi bien (voir mieux) !");
        $BandeDessinee->setAuteur('Masasumi Kakizaki');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Mangas');
        $BandeDessinee->setSousGenre('Divers');
        $BandeDessinee->setAffiche('/revue/affiche_Manga4.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');

        $manager->persist($BandeDessinee);

        // Crée 1 commentaire pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('R6-4Life');
        $commentaire->setContenu('Rien avoir avec le jeu en effet... Très déçu');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 20; $y++){
            $note = new Notes();
            $note->setValeur(1);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Manga humour Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Dragon Ball');
        $BandeDessinee->setDescription("Tu connais nan ?");
        $BandeDessinee->setAuteur('Akira Toriyama');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Mangas');
        $BandeDessinee->setSousGenre('Humour');
        $BandeDessinee->setAffiche('/revue/affiche_Manga5.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Manga1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Manga2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Manga3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Manga4.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Manga ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Waw j adore je suis fan depuis que je suis tout petit');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Manga d'Humour Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre("D'Encre et de Feu");
        $BandeDessinee->setDescription("田中さんの一日. 田中さんは英語の学生です。");
        $BandeDessinee->setAuteur('Felix');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Mangas');
        $BandeDessinee->setSousGenre('Humour');
        $BandeDessinee->setAffiche('/revue/affiche_Manga6.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Manga1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Manga2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Manga3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Manga4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_Manga5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Manga ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Manga de Policier Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Sherlock');
        $BandeDessinee->setDescription("Une étude en rose.");
        $BandeDessinee->setAuteur('Steve Moffat');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Mangas');
        $BandeDessinee->setSousGenre('Policier');
        $BandeDessinee->setAffiche('/revue/affiche_Manga7.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Manga1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Manga2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Manga3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Manga4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_Manga5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Manga ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Manga de Fantaisy Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Granblue Fantaisy');
        $BandeDessinee->setDescription("Youhouuuuuuuuu !");
        $BandeDessinee->setAuteur('Amélie Kamo');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Mangas');
        $BandeDessinee->setSousGenre('Fantaisy');
        $BandeDessinee->setAffiche('/revue/affiche_Manga8.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Manga1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Manga2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Manga3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Manga4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_Manga5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Manga ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        /* ----------------------LES COMICS --------------------------*/

        // Crée 1 Comics d'Aventure Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Rick et Morty');
        $BandeDessinee->setDescription("Tu connais aussi nan ?");
        $BandeDessinee->setAuteur('Troy Little');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Comics');
        $BandeDessinee->setSousGenre('Aventure');
        $BandeDessinee->setAffiche('/revue/affiche_Comics1.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Comics1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Comics2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Comics3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Comics4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_Comics5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Comics ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }


        // Crée 1 Comics Fantasy trop vieux
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Conan le Barbare');
        $BandeDessinee->setDescription("Conan est un jeune Cimmérien avide d’aventures. Très jeune, il quitte la Cimmérie, présentée par Howard comme une contrée sombre et sinistre.");
        $BandeDessinee->setAuteur('Roy Thomas');
        $BandeDessinee->setDateDeParution(new \DateTime('2019-05-05 00:00:00'));
        $BandeDessinee->setGenre('Comics');
        $BandeDessinee->setSousGenre('Fantasy');
        $BandeDessinee->setAffiche('/revue/affiche_Comics2.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Comics1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Comics2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Comics3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Comics4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_Comics5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jérome');
        $commentaire->setContenu('Pas trop mal');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Titiana la liseuse');
        $commentaire->setContenu(  " j'm bcp le dessin");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jojo le zozo ');
        $commentaire->setContenu("c nulnulnul é c tro vieu !");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 4; $y++){
            $note = new Notes();
            $note->setValeur(4);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }
        for($y = 0; $y < 4; $y++){
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Comics Historique qui n'a pas assez de notes
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Viking');
        $BandeDessinee->setDescription("Scandinavie, IXe siècle. Finn et Egil sont deux frères habitués aux sales combines : racket, vol et pillage en tout genre. Si l'un est mauvais, l'autre est encore pire.");
        $BandeDessinee->setAuteur('Ivan Brandon');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Comics');
        $BandeDessinee->setSousGenre('Historique');
        $BandeDessinee->setAffiche('/revue/affiche_Comics3.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Comics1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Comics2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Comics3.jpg');

        $manager->persist($BandeDessinee);

        // Crée 8 notes pour le Comics et les lie
        for($y = 0; $y < 7; $y++){
            $note = new Notes();
            $note->setValeur(4.3);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Comics Divers qui a de trop mauvaises notes
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Riverdale');
        $BandeDessinee->setDescription("C'était avant Netflix...");
        $BandeDessinee->setAuteur('Eliott Fernandez');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Comics');
        $BandeDessinee->setSousGenre('Divers');
        $BandeDessinee->setAffiche('/revue/affiche_Comics4.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');

        $manager->persist($BandeDessinee);

        // Crée 1 commentaire pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('NetflixAndChill');
        $commentaire->setContenu('Je prefere me caler devant ma télé franchement...');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 20; $y++){
            $note = new Notes();
            $note->setValeur(1);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Comics humour Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Les Simpson & Futurama');
        $BandeDessinee->setDescription("Mélange des 2 meilleurs séries de la vie !");
        $BandeDessinee->setAuteur('Matt Groening');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Comics');
        $BandeDessinee->setSousGenre('Humour');
        $BandeDessinee->setAffiche('/revue/affiche_Comics5.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Comics1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Comics2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Comics3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Comics4.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Comics ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Waw j adore je suis fan de ces 2 séries depuis que je suis tout petit');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Comics d'Aventure Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('One Piece');
        $BandeDessinee->setDescription("Une Piece.");
        $BandeDessinee->setAuteur('Le banquier');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Comics');
        $BandeDessinee->setSousGenre('Aventure');
        $BandeDessinee->setAffiche('/revue/affiche_Comics6.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Comics1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Comics2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Comics3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Comics4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_Comics5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Comics ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Comics d'Humour Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Bib et Zette');
        $BandeDessinee->setDescription("C'est l'histopire incroyable et facinante de Bib et Zette");
        $BandeDessinee->setAuteur('Karl Justiniano');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Comics');
        $BandeDessinee->setSousGenre('Humour');
        $BandeDessinee->setAffiche('/revue/affiche_Comics7.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Comics1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Comics2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Comics3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Comics4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_Comics5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Comics ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 1 Comics d'Humour Tendance
        $BandeDessinee= new BandeDessinee();
        $BandeDessinee->setTitre('Black Magick');
        $BandeDessinee->setDescription("Plus aucun voleur ne rodera dans la ville");
        $BandeDessinee->setAuteur('Jean-Pierre Lambert');
        $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinee->setGenre('Comics');
        $BandeDessinee->setSousGenre('Policier');
        $BandeDessinee->setAffiche('/revue/affiche_Comics8.jpg');
        $BandeDessinee->setLivrePDF('/pdf/BD_Revue.pdf');
        $BandeDessinee->setPlanche1('/revue/planche_Comics1.jpg');
        $BandeDessinee->setPlanche2('/revue/planche_Comics2.jpg');
        $BandeDessinee->setPlanche3('/revue/planche_Comics3.jpg');
        $BandeDessinee->setPlanche4('/revue/planche_Comics4.jpg');
        $BandeDessinee->setPlanche5('/revue/planche_Comics5.jpg');

        $manager->persist($BandeDessinee);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Comics ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinee);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }



        $manager->flush();

    }
}

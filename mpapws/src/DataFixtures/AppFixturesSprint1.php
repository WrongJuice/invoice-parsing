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

        $BandeDessinees = array();

        // Crée 1 BD de Science Fiction Tendance
            $BandeDessinees[0]= new BandeDessinee();
            $BandeDessinees[0]->setTitre('La marche sur la Lune');
            $BandeDessinees[0]->setDescription("Vivez l'aventure de Tom qui part essayer de marcher sur la lune avec ses amis ! Je m'appelle Jean-Jacques Mulusson sur mon Tipee");
            $BandeDessinees[0]->setAuteur('Jean-Jacques Molusson');
            $BandeDessinees[0]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
            $BandeDessinees[0]->setGenre('BD');
            $BandeDessinees[0]->setSousGenre('Aventure');

           $manager->persist($BandeDessinees[0]);

              // Crée 3 commentaires pour la BD et les lie
            $commentaire= new Commentaire();
            $commentaire->setAuteur('Daniel');
            $commentaire->setContenu('Super BD ca !');
            $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
            $commentaire->setSaBandeDessinee($BandeDessinees[0]);
            $manager->persist($commentaire);

            $commentaire= new Commentaire();
            $commentaire->setAuteur('Jean Jacques Mulusson');
            $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
            $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
            $commentaire->setSaBandeDessinee($BandeDessinees[0]);
            $manager->persist($commentaire);

            $commentaire= new Commentaire();
            $commentaire->setAuteur('Eric ');
            $commentaire->setContenu('Enorme le concept d aller sur la lune xd');
            $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
            $commentaire->setSaBandeDessinee($BandeDessinees[0]);
            $manager->persist($commentaire);


              // Crée 10 notes pour la BD et les lie
            for($y = 0; $y < 15; $y++) {
                $note = new Notes();
                $note->setValeur(5);
                $note->setSaBandeDessinee($BandeDessinees[0]);
                $manager->persist($note);
            }

        // Crée 1 BD Fantasy trop vieille
        $BandeDessinees[1]= new BandeDessinee();
        $BandeDessinees[1]->setTitre('Gnomes');
        $BandeDessinees[1]->setDescription("Ceci est ma première BD soyez simpa, c'est l'histoire de deux petits gnomes en quête d'un trésor");
        $BandeDessinees[1]->setAuteur('Diego le dessinateur');
        $BandeDessinees[1]->setDateDeParution(new \DateTime('2019-05-05 00:00:00'));
        $BandeDessinees[1]->setGenre('BD');
        $BandeDessinees[1]->setSousGenre('Fantasy');

        $manager->persist($BandeDessinees[1]);

        // Crée 3 commentaires pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jérome');
        $commentaire->setContenu('Pas trop mal');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[1]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Titiana la liseuse');
        $commentaire->setContenu(  " j'm bcp le dessin");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[1]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jojo le zozo ');
        $commentaire->setContenu("kil son moche ces petits gnomes");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[1]);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 4; $y++){
            $note = new Notes();
            $note->setValeur(4);
            $note->setSaBandeDessinee($BandeDessinees[1]);
            $manager->persist($note);
        }
        for($y = 0; $y < 5; $y++){
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[1]);
            $manager->persist($note);
        }

        // Crée 1 BD Historique qui n'a pas assez de notes
        $BandeDessinees[2]= new BandeDessinee();
        $BandeDessinees[2]->setTitre('2nd Guerre Mondiale');
        $BandeDessinees[2]->setDescription("Henry est un soldat français ayant vécu les deux guerres mondiales, découvrez sa rencontre avec un soldat Italien pas comme les autres... Mon Tipee : www.tipee/Henry.com");
        $BandeDessinees[2]->setAuteur('Henry Lamoelle');
        $BandeDessinees[2]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[2]->setGenre('BD');
        $BandeDessinees[2]->setSousGenre('Historique');

        $manager->persist($BandeDessinees[2]);

        // Crée 8 notes pour la BD et les lie
        for($y = 0; $y < 7; $y++){
            $note = new Notes();
            $note->setValeur(4.3);
            $note->setSaBandeDessinee($BandeDessinees[2]);
            $manager->persist($note);
        }

        // Crée 1 BD Divers qui a de trop mauvaises notes
        $BandeDessinees[3]= new BandeDessinee();
        $BandeDessinees[3]->setTitre('Tattoo Passion');
        $BandeDessinees[3]->setDescription("Jadore les tatto lisez ma bd");
        $BandeDessinees[3]->setAuteur('EvelynnTatoo');
        $BandeDessinees[3]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[3]->setGenre('BD');
        $BandeDessinees[3]->setSousGenre('Divers');

        $manager->persist($BandeDessinees[3]);

        // Crée 1 commentaire pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('jmLesTatoo');
        $commentaire->setContenu('pas ouf comme BD de tatoo...');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[3]);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 20; $y++){
            $note = new Notes();
            $note->setValeur(1);
            $note->setSaBandeDessinee($BandeDessinees[3]);
            $manager->persist($note);
        }

         //Crée 1 BD humour Tendance
        $BandeDessinees[4]= new BandeDessinee();
        $BandeDessinees[4]->setTitre('Totoche');
        $BandeDessinees[4]->setDescription("Voici les aventures foloches de Totoche");
        $BandeDessinees[4]->setAuteur('Lucien Monera');
        $BandeDessinees[4]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[4]->setGenre('BD');
        $BandeDessinees[4]->setSousGenre('Humour');

        $manager->persist($BandeDessinees[4]);

        // Crée 3 commentaires pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super BD ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[4]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[4]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Enorme le concept d aller sur la lune xd');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[4]);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[4]);
            $manager->persist($note);
        }

        // Crée 1 BD d'Humour Tendance
        $BandeDessinees[5]= new BandeDessinee();
        $BandeDessinees[5]->setTitre('Les Profs');
        $BandeDessinees[5]->setDescription("Ca te rappellera l'époque du collège");
        $BandeDessinees[5]->setAuteur('Michel Pierre');
        $BandeDessinees[5]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[5]->setGenre('BD');
        $BandeDessinees[5]->setSousGenre('Humour');

        $manager->persist($BandeDessinees[5]);

        // Crée 3 commentaires pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super BD ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[5]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[5]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Vraiment super, j adore aussi je lache un 5 etoiles !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[5]);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[5]);
            $manager->persist($note);
        }

        // Crée 1 BD d'Humour Tendance
        $BandeDessinees[6]= new BandeDessinee();
        $BandeDessinees[6]->setTitre('Gaston');
        $BandeDessinees[6]->setDescription("Gaston (pas le hérisson)");
        $BandeDessinees[6]->setAuteur('Stephan Namaspamousse');
        $BandeDessinees[6]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[6]->setGenre('BD');
        $BandeDessinees[6]->setSousGenre('Humour');

        $manager->persist($BandeDessinees[6]);

        // Crée 3 commentaires pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super BD ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[6]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[6]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Vraiment super, j adore aussi je lache un 5 etoiles !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[6]);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[6]);
            $manager->persist($note);
        }

        // Crée 1 BD d'Humour Tendance
        $BandeDessinees[7]= new BandeDessinee();
        $BandeDessinees[7]->setTitre('Les Policiers');
        $BandeDessinees[7]->setDescription("Tout est dans le titre.");
        $BandeDessinees[7]->setAuteur('Le comissaire');
        $BandeDessinees[7]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[7]->setGenre('BD');
        $BandeDessinees[7]->setSousGenre('Policier');

        $manager->persist($BandeDessinees[7]);

        // Crée 3 commentaires pour la BD et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super BD ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[7]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[7]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Vraiment super, j adore aussi je lache un 5 etoiles !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[7]);
        $manager->persist($commentaire);


        // Crée 10 notes pour la BD et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[7]);
            $manager->persist($note);
        }

        /* ----------------------LES MANGAS --------------------------*/

        // Crée 1 Manga d'Aventure Tendance
        $BandeDessinees[8]= new BandeDessinee();
        $BandeDessinees[8]->setTitre('Fairy Tail Zero');
        $BandeDessinees[8]->setDescription("On y suit en particulier l'histoire d'une petite fille nommée Mavis Vermillon. Son aventure l’amènera à fonder Fairy Tail, une guilde de mages tapageurs et bien connues quelques décennies plus tard.");
        $BandeDessinees[8]->setAuteur('Hiro Mashima');
        $BandeDessinees[8]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[8]->setGenre('Mangas');
        $BandeDessinees[8]->setSousGenre('Aventure');

        $manager->persist($BandeDessinees[8]);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Manga ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[8]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[8]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[8]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[8]);
            $manager->persist($note);
        }


        // Crée 1 Manga Fantasy trop vieux
        $BandeDessinees[9]= new BandeDessinee();
        $BandeDessinees[9]->setTitre('Strike the Blood');
        $BandeDessinees[9]->setDescription("Strike the Blood parle des aventures du jeune Kojo Akatsuki, qui n'est autre que le vampire le plus puissant du monde. L'histoire se passe dans un milieu scolaire.");
        $BandeDessinees[9]->setAuteur('Gakuto Mikumo');
        $BandeDessinees[9]->setDateDeParution(new \DateTime('2019-05-05 00:00:00'));
        $BandeDessinees[9]->setGenre('Mangas');
        $BandeDessinees[9]->setSousGenre('Fantasy');

        $manager->persist($BandeDessinees[9]);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jérome');
        $commentaire->setContenu('Pas trop mal');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[9]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Titiana la liseuse');
        $commentaire->setContenu(  " j'm bcp le dessin");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[9]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jojo le zozo ');
        $commentaire->setContenu("zaime po sa tete");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[9]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 4; $y++){
            $note = new Notes();
            $note->setValeur(4);
            $note->setSaBandeDessinee($BandeDessinees[9]);
            $manager->persist($note);
        }
        for($y = 0; $y < 4; $y++){
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[9]);
            $manager->persist($note);
        }

        // Crée 1 Manga Historique qui n'a pas assez de notes
        $BandeDessinees[10]= new BandeDessinee();
        $BandeDessinees[10]->setTitre('La Rose de Versailles');
        $BandeDessinees[10]->setDescription("Lady Oscar fille du général de Jarjayes vint au monde en 1755 en même temps que la future reine de France Marie-Antoinette d'Autriche...");
        $BandeDessinees[10]->setAuteur('Riyoko Ikeda');
        $BandeDessinees[10]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[10]->setGenre('Mangas');
        $BandeDessinees[10]->setSousGenre('Historique');

        $manager->persist($BandeDessinees[10]);

        // Crée 8 notes pour le Manga et les lie
        for($y = 0; $y < 7; $y++){
            $note = new Notes();
            $note->setValeur(4.3);
            $note->setSaBandeDessinee($BandeDessinees[10]);
            $manager->persist($note);
        }

        // Crée 1 Manga Divers qui a de trop mauvaises notes
        $BandeDessinees[11]= new BandeDessinee();
        $BandeDessinees[11]->setTitre('Rainbow 6');
        $BandeDessinees[11]->setDescription("C'est pas le jeu mdr, mais c'est tout aussi bien (voir mieux) !");
        $BandeDessinees[11]->setAuteur('Masasumi Kakizaki');
        $BandeDessinees[11]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[11]->setGenre('Mangas');
        $BandeDessinees[11]->setSousGenre('Divers');

        $manager->persist($BandeDessinees[11]);

        // Crée 1 commentaire pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('R6-4Life');
        $commentaire->setContenu('Rien avoir avec le jeu en effet... Très déçu');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[11]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 20; $y++){
            $note = new Notes();
            $note->setValeur(1);
            $note->setSaBandeDessinee($BandeDessinees[11]);
            $manager->persist($note);
        }

        // Crée 1 Manga humour Tendance
        $BandeDessinees[12]= new BandeDessinee();
        $BandeDessinees[12]->setTitre('Dragon Ball');
        $BandeDessinees[12]->setDescription("Tu connais nan ?");
        $BandeDessinees[12]->setAuteur('Akira Toriyama');
        $BandeDessinees[12]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[12]->setGenre('Mangas');
        $BandeDessinees[12]->setSousGenre('Humour');

        $manager->persist($BandeDessinees[12]);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Manga ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[12]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[12]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Waw j adore je suis fan depuis que je suis tout petit');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[12]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[12]);
            $manager->persist($note);
        }

        // Crée 1 Manga d'Humour Tendance
        $BandeDessinees[13]= new BandeDessinee();
        $BandeDessinees[13]->setTitre("D'Encre et de Feu");
        $BandeDessinees[13]->setDescription("田中さんの一日. 田中さんは英語の学生です。");
        $BandeDessinees[13]->setAuteur('Felix');
        $BandeDessinees[13]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[13]->setGenre('Mangas');
        $BandeDessinees[13]->setSousGenre('Humour');

        $manager->persist($BandeDessinees[13]);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Manga ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[13]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[13]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[13]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[13]);
            $manager->persist($note);
        }

        // Crée 1 Manga de Policier Tendance
        $BandeDessinees[14]= new BandeDessinee();
        $BandeDessinees[14]->setTitre('Sherlock');
        $BandeDessinees[14]->setDescription("Une étude en rose.");
        $BandeDessinees[14]->setAuteur('Steve Moffat');
        $BandeDessinees[14]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[14]->setGenre('Mangas');
        $BandeDessinees[14]->setSousGenre('Policier');

        $manager->persist($BandeDessinees[14]);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Manga ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[14]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[14]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[14]);
        $manager->persist($commentaire);

        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[14]);
            $manager->persist($note);
        }

        // Crée 1 Manga de Fantaisy Tendance
        $BandeDessinees[15]= new BandeDessinee();
        $BandeDessinees[15]->setTitre('Granblue Fantaisy');
        $BandeDessinees[15]->setDescription("Youhouuuuuuuuu !");
        $BandeDessinees[15]->setAuteur('Amélie Kamo');
        $BandeDessinees[15]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[15]->setGenre('Mangas');
        $BandeDessinees[15]->setSousGenre('Fantaisy');

        $manager->persist($BandeDessinees[15]);

        // Crée 3 commentaires pour le Manga et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Manga ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[15]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[15]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[15]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Manga et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[15]);
            $manager->persist($note);
        }

        /* ----------------------LES COMICS --------------------------*/

        // Crée 1 Comics d'Aventure Tendance
        $BandeDessinees[16]= new BandeDessinee();
        $BandeDessinees[16]->setTitre('Rick et Morty');
        $BandeDessinees[16]->setDescription("Tu connais aussi nan ?");
        $BandeDessinees[16]->setAuteur('Troy Little');
        $BandeDessinees[16]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[16]->setGenre('Comics');
        $BandeDessinees[16]->setSousGenre('Aventure');

        $manager->persist($BandeDessinees[16]);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Comics ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[16]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[16]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[16]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[16]);
            $manager->persist($note);
        }


        // Crée 1 Comics Fantasy trop vieux
        $BandeDessinees[17]= new BandeDessinee();
        $BandeDessinees[17]->setTitre('Conan le Barbare');
        $BandeDessinees[17]->setDescription("Conan est un jeune Cimmérien avide d’aventures. Très jeune, il quitte la Cimmérie, présentée par Howard comme une contrée sombre et sinistre.");
        $BandeDessinees[17]->setAuteur('Roy Thomas');
        $BandeDessinees[17]->setDateDeParution(new \DateTime('2019-05-05 00:00:00'));
        $BandeDessinees[17]->setGenre('Comics');
        $BandeDessinees[17]->setSousGenre('Fantasy');

        $manager->persist($BandeDessinees[17]);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jérome');
        $commentaire->setContenu('Pas trop mal');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[17]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Titiana la liseuse');
        $commentaire->setContenu(  " j'm bcp le dessin");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[17]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jojo le zozo ');
        $commentaire->setContenu("c nulnulnul é c tro vieu !");
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[17]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 4; $y++){
            $note = new Notes();
            $note->setValeur(4);
            $note->setSaBandeDessinee($BandeDessinees[17]);
            $manager->persist($note);
        }
        for($y = 0; $y < 4; $y++){
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[17]);
            $manager->persist($note);
        }

        // Crée 1 Comics Historique qui n'a pas assez de notes
        $BandeDessinees[18]= new BandeDessinee();
        $BandeDessinees[18]->setTitre('Viking');
        $BandeDessinees[18]->setDescription("Scandinavie, IXe siècle. Finn et Egil sont deux frères habitués aux sales combines : racket, vol et pillage en tout genre. Si l'un est mauvais, l'autre est encore pire.");
        $BandeDessinees[18]->setAuteur('Ivan Brandon');
        $BandeDessinees[18]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[18]->setGenre('Comics');
        $BandeDessinees[18]->setSousGenre('Historique');

        $manager->persist($BandeDessinees[18]);

        // Crée 8 notes pour le Comics et les lie
        for($y = 0; $y < 7; $y++){
            $note = new Notes();
            $note->setValeur(4.3);
            $note->setSaBandeDessinee($BandeDessinees[18]);
            $manager->persist($note);
        }

        // Crée 1 Comics Divers qui a de trop mauvaises notes
        $BandeDessinees[19]= new BandeDessinee();
        $BandeDessinees[19]->setTitre('Riverdale');
        $BandeDessinees[19]->setDescription("C'était avant Netflix...");
        $BandeDessinees[19]->setAuteur('Eliott Fernandez');
        $BandeDessinees[19]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[19]->setGenre('Comics');
        $BandeDessinees[19]->setSousGenre('Divers');

        $manager->persist($BandeDessinees[19]);

        // Crée 1 commentaire pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('NetflixAndChill');
        $commentaire->setContenu('Je prefere me caler devant ma télé franchement...');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[19]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 20; $y++){
            $note = new Notes();
            $note->setValeur(1);
            $note->setSaBandeDessinee($BandeDessinees[19]);
            $manager->persist($note);
        }

        // Crée 1 Comics humour Tendance
        $BandeDessinees[20]= new BandeDessinee();
        $BandeDessinees[20]->setTitre('Les Simpson & Futurama');
        $BandeDessinees[20]->setDescription("Mélange des 2 meilleurs séries de la vie !");
        $BandeDessinees[20]->setAuteur('Matt Groening');
        $BandeDessinees[20]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[20]->setGenre('Comics');
        $BandeDessinees[20]->setSousGenre('Humour');

        $manager->persist($BandeDessinees[20]);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Comics ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[20]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Jean Jacques Mulusson');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[20]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Waw j adore je suis fan de ces 2 séries depuis que je suis tout petit');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[20]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[20]);
            $manager->persist($note);
        }

        // Crée 1 Comics d'Aventure Tendance
        $BandeDessinees[21]= new BandeDessinee();
        $BandeDessinees[21]->setTitre('One Piece');
        $BandeDessinees[21]->setDescription("Une Piece.");
        $BandeDessinees[21]->setAuteur('Le banquier');
        $BandeDessinees[21]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[21]->setGenre('Comics');
        $BandeDessinees[21]->setSousGenre('Aventure');

        $manager->persist($BandeDessinees[21]);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Comics ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[21]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[21]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[21]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[21]);
            $manager->persist($note);
        }

        // Crée 1 Comics d'Humour Tendance
        $BandeDessinees[22]= new BandeDessinee();
        $BandeDessinees[22]->setTitre('Bib et Zette');
        $BandeDessinees[22]->setDescription("C'est l'histopire incroyable et facinante de Bib et Zette");
        $BandeDessinees[22]->setAuteur('Karl Justiniano');
        $BandeDessinees[22]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[22]->setGenre('Comics');
        $BandeDessinees[22]->setSousGenre('Humour');

        $manager->persist($BandeDessinees[22]);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Comics ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[22]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[22]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[22]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[22]);
            $manager->persist($note);
        }

        // Crée 1 Comics d'Humour Tendance
        $BandeDessinees[23]= new BandeDessinee();
        $BandeDessinees[23]->setTitre('Black Magick');
        $BandeDessinees[23]->setDescription("Plus aucun voleur ne rodera dans la ville");
        $BandeDessinees[23]->setAuteur('Jean-Pierre Lambert');
        $BandeDessinees[23]->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
        $BandeDessinees[23]->setGenre('Comics');
        $BandeDessinees[23]->setSousGenre('Policier');

        $manager->persist($BandeDessinees[23]);

        // Crée 3 commentaires pour le Comics et les lie
        $commentaire= new Commentaire();
        $commentaire->setAuteur('Daniel');
        $commentaire->setContenu('Super Comics ca !');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[23]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Hiro Mashima');
        $commentaire->setContenu('Merci ! Fais moi un don sur tipee si tu aime  ');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[23]);
        $manager->persist($commentaire);

        $commentaire= new Commentaire();
        $commentaire->setAuteur('Eric ');
        $commentaire->setContenu('Je m identifie beaucoup au personnage, c est tres interessant.');
        $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
        $commentaire->setSaBandeDessinee($BandeDessinees[23]);
        $manager->persist($commentaire);


        // Crée 10 notes pour le Comics et les lie
        for($y = 0; $y < 15; $y++) {
            $note = new Notes();
            $note->setValeur(5);
            $note->setSaBandeDessinee($BandeDessinees[23]);
            $manager->persist($note);
        }

        $manager->flush();



        mkdir('public/data/' . $BandeDessinees[0]->getId(),755);
        copy('public/data_fixtures/affiche_BD1.jpg' , 'public/data/' . $BandeDessinees[0]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[0]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_BD1.jpg' , 'public/data/' . $BandeDessinees[0]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_BD2.jpg' , 'public/data/' . $BandeDessinees[0]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_BD3.jpg' , 'public/data/' . $BandeDessinees[0]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_BD4.jpg' , 'public/data/' . $BandeDessinees[0]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_BD5.jpg' , 'public/data/' . $BandeDessinees[0]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[1]->getId(),755);
        copy('public/data_fixtures/affiche_BD2.jpg' , 'public/data/' . $BandeDessinees[1]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[1]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_BD1.jpg' , 'public/data/' . $BandeDessinees[1]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_BD2.jpg' , 'public/data/' . $BandeDessinees[1]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_BD3.jpg' , 'public/data/' . $BandeDessinees[1]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_BD4.jpg' , 'public/data/' . $BandeDessinees[1]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_BD5.jpg' , 'public/data/' . $BandeDessinees[1]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[2]->getId(),755);
        copy('public/data_fixtures/affiche_BD3.jpg' , 'public/data/' . $BandeDessinees[2]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[2]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_BD1.jpg' , 'public/data/' . $BandeDessinees[2]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_BD2.jpg' , 'public/data/' . $BandeDessinees[2]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_BD3.jpg' , 'public/data/' . $BandeDessinees[2]->getId() . '/p3.jpg');

        mkdir('public/data/' . $BandeDessinees[3]->getId(),755);
        copy('public/data_fixtures/affiche_BD4.jpg' , 'public/data/' . $BandeDessinees[3]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[3]->getId() . '/livre.pdf');

        mkdir('public/data/' . $BandeDessinees[4]->getId(),755);
        copy('public/data_fixtures/affiche_BD5.jpg' , 'public/data/' . $BandeDessinees[4]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[4]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_BD1.jpg' , 'public/data/' . $BandeDessinees[4]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_BD2.jpg' , 'public/data/' . $BandeDessinees[4]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_BD3.jpg' , 'public/data/' . $BandeDessinees[4]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_BD4.jpg' , 'public/data/' . $BandeDessinees[4]->getId() . '/p4.jpg');

        mkdir('public/data/' . $BandeDessinees[5]->getId(),755);
        copy('public/data_fixtures/affiche_BD6.jpg' , 'public/data/' . $BandeDessinees[5]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[5]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_BD1.jpg' , 'public/data/' . $BandeDessinees[5]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_BD2.jpg' , 'public/data/' . $BandeDessinees[5]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_BD3.jpg' , 'public/data/' . $BandeDessinees[5]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_BD4.jpg' , 'public/data/' . $BandeDessinees[5]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_BD5.jpg' , 'public/data/' . $BandeDessinees[5]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[6]->getId(),755);
        copy('public/data_fixtures/affiche_BD7.jpg' , 'public/data/' . $BandeDessinees[6]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[6]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_BD1.jpg' , 'public/data/' . $BandeDessinees[6]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_BD2.jpg' , 'public/data/' . $BandeDessinees[6]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_BD3.jpg' , 'public/data/' . $BandeDessinees[6]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_BD4.jpg' , 'public/data/' . $BandeDessinees[6]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_BD5.jpg' , 'public/data/' . $BandeDessinees[6]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[7]->getId(),755);
        copy('public/data_fixtures/affiche_BD8.jpg' , 'public/data/' . $BandeDessinees[7]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[7]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_BD1.jpg' , 'public/data/' . $BandeDessinees[7]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_BD2.jpg' , 'public/data/' . $BandeDessinees[7]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_BD3.jpg' , 'public/data/' . $BandeDessinees[7]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_BD4.jpg' , 'public/data/' . $BandeDessinees[7]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_BD5.jpg' , 'public/data/' . $BandeDessinees[7]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[8]->getId(),755);
        copy('public/data_fixtures/affiche_Manga1.jpg' , 'public/data/' . $BandeDessinees[8]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[8]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Manga1.jpg' , 'public/data/' . $BandeDessinees[8]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Manga2.jpg' , 'public/data/' . $BandeDessinees[8]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Manga3.jpg' , 'public/data/' . $BandeDessinees[8]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Manga4.jpg' , 'public/data/' . $BandeDessinees[8]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_Manga5.jpg' , 'public/data/' . $BandeDessinees[8]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[9]->getId(),755);
        copy('public/data_fixtures/affiche_Manga2.jpg' , 'public/data/' . $BandeDessinees[9]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[9]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Manga1.jpg' , 'public/data/' . $BandeDessinees[9]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Manga2.jpg' , 'public/data/' . $BandeDessinees[9]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Manga3.jpg' , 'public/data/' . $BandeDessinees[9]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Manga4.jpg' , 'public/data/' . $BandeDessinees[9]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_Manga5.jpg' , 'public/data/' . $BandeDessinees[9]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[10]->getId(),755);
        copy('public/data_fixtures/affiche_Manga3.jpg' , 'public/data/' . $BandeDessinees[10]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[10]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Manga1.jpg' , 'public/data/' . $BandeDessinees[10]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Manga2.jpg' , 'public/data/' . $BandeDessinees[10]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Manga3.jpg' , 'public/data/' . $BandeDessinees[10]->getId() . '/p3.jpg');

        mkdir('public/data/' . $BandeDessinees[11]->getId(),755);
        copy('public/data_fixtures/affiche_Manga4.jpg' , 'public/data/' . $BandeDessinees[11]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[11]->getId() . '/livre.pdf');

        mkdir('public/data/' . $BandeDessinees[12]->getId(),755);
        copy('public/data_fixtures/affiche_Manga5.jpg' , 'public/data/' . $BandeDessinees[12]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[12]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Manga1.jpg' , 'public/data/' . $BandeDessinees[12]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Manga2.jpg' , 'public/data/' . $BandeDessinees[12]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Manga3.jpg' , 'public/data/' . $BandeDessinees[12]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Manga4.jpg' , 'public/data/' . $BandeDessinees[12]->getId() . '/p4.jpg');

        mkdir('public/data/' . $BandeDessinees[13]->getId(),755);
        copy('public/data_fixtures/affiche_Manga6.jpg' , 'public/data/' . $BandeDessinees[13]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[13]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Manga1.jpg' , 'public/data/' . $BandeDessinees[13]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Manga2.jpg' , 'public/data/' . $BandeDessinees[13]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Manga3.jpg' , 'public/data/' . $BandeDessinees[13]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Manga4.jpg' , 'public/data/' . $BandeDessinees[13]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_Manga5.jpg' , 'public/data/' . $BandeDessinees[13]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[14]->getId(),755);
        copy('public/data_fixtures/affiche_Manga7.jpg' , 'public/data/' . $BandeDessinees[14]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[14]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Manga1.jpg' , 'public/data/' . $BandeDessinees[14]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Manga2.jpg' , 'public/data/' . $BandeDessinees[14]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Manga3.jpg' , 'public/data/' . $BandeDessinees[14]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Manga4.jpg' , 'public/data/' . $BandeDessinees[14]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_Manga5.jpg' , 'public/data/' . $BandeDessinees[14]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[15]->getId(),755);
        copy('public/data_fixtures/affiche_Manga8.jpg' , 'public/data/' . $BandeDessinees[15]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[15]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Manga1.jpg' , 'public/data/' . $BandeDessinees[15]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Manga2.jpg' , 'public/data/' . $BandeDessinees[15]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Manga3.jpg' , 'public/data/' . $BandeDessinees[15]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Manga4.jpg' , 'public/data/' . $BandeDessinees[15]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_Manga5.jpg' , 'public/data/' . $BandeDessinees[15]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[16]->getId(),755);
        copy('public/data_fixtures/affiche_Comics1.jpg' , 'public/data/' . $BandeDessinees[16]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[16]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Comics1.jpg' , 'public/data/' . $BandeDessinees[16]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Comics2.jpg' , 'public/data/' . $BandeDessinees[16]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Comics3.jpg' , 'public/data/' . $BandeDessinees[16]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Comics4.jpg' , 'public/data/' . $BandeDessinees[16]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_Comics5.jpg' , 'public/data/' . $BandeDessinees[16]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[17]->getId(),755);
        copy('public/data_fixtures/affiche_Comics2.jpg' , 'public/data/' . $BandeDessinees[17]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[17]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Comics1.jpg' , 'public/data/' . $BandeDessinees[17]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Comics2.jpg' , 'public/data/' . $BandeDessinees[17]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Comics3.jpg' , 'public/data/' . $BandeDessinees[17]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Comics4.jpg' , 'public/data/' . $BandeDessinees[17]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_Comics5.jpg' , 'public/data/' . $BandeDessinees[17]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[18]->getId(),755);
        copy('public/data_fixtures/affiche_Comics3.jpg' , 'public/data/' . $BandeDessinees[18]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[18]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Comics1.jpg' , 'public/data/' . $BandeDessinees[18]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Comics2.jpg' , 'public/data/' . $BandeDessinees[18]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Comics3.jpg' , 'public/data/' . $BandeDessinees[18]->getId() . '/p3.jpg');

        mkdir('public/data/' . $BandeDessinees[19]->getId(),755);
        copy('public/data_fixtures/affiche_Comics4.jpg' , 'public/data/' . $BandeDessinees[19]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[19]->getId() . '/livre.pdf');

        mkdir('public/data/' . $BandeDessinees[20]->getId(),755);
        copy('public/data_fixtures/affiche_Comics5.jpg' , 'public/data/' . $BandeDessinees[20]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[20]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Comics1.jpg' , 'public/data/' . $BandeDessinees[20]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Comics2.jpg' , 'public/data/' . $BandeDessinees[20]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Comics3.jpg' , 'public/data/' . $BandeDessinees[20]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Comics4.jpg' , 'public/data/' . $BandeDessinees[20]->getId() . '/p4.jpg');

        mkdir('public/data/' . $BandeDessinees[21]->getId(),755);
        copy('public/data_fixtures/affiche_Comics7.jpg' , 'public/data/' . $BandeDessinees[21]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[21]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Comics1.jpg' , 'public/data/' . $BandeDessinees[21]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Comics2.jpg' , 'public/data/' . $BandeDessinees[21]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Comics3.jpg' , 'public/data/' . $BandeDessinees[21]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Comics4.jpg' , 'public/data/' . $BandeDessinees[21]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_Comics5.jpg' , 'public/data/' . $BandeDessinees[21]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[22]->getId(),755);
        copy('public/data_fixtures/affiche_Comics8.jpg' , 'public/data/' . $BandeDessinees[22]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[22]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Comics1.jpg' , 'public/data/' . $BandeDessinees[22]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Comics2.jpg' , 'public/data/' . $BandeDessinees[22]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Comics3.jpg' , 'public/data/' . $BandeDessinees[22]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Comics4.jpg' , 'public/data/' . $BandeDessinees[22]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_Comics5.jpg' , 'public/data/' . $BandeDessinees[22]->getId() . '/p5.jpg');

        mkdir('public/data/' . $BandeDessinees[23]->getId(),755);
        copy('public/data_fixtures/affiche_Comics8.jpg' , 'public/data/' . $BandeDessinees[23]->getId() . '/affiche.jpg');
        copy('public/data_fixtures/BD_Revue.pdf' , 'public/data/' . $BandeDessinees[23]->getId() . '/livre.pdf');
        copy('public/data_fixtures/planche_Comics1.jpg' , 'public/data/' . $BandeDessinees[23]->getId() . '/p1.jpg');
        copy('public/data_fixtures/planche_Comics2.jpg' , 'public/data/' . $BandeDessinees[23]->getId() . '/p2.jpg');
        copy('public/data_fixtures/planche_Comics3.jpg' , 'public/data/' . $BandeDessinees[23]->getId() . '/p3.jpg');
        copy('public/data_fixtures/planche_Comics4.jpg' , 'public/data/' . $BandeDessinees[23]->getId() . '/p4.jpg');
        copy('public/data_fixtures/planche_Comics5.jpg' , 'public/data/' . $BandeDessinees[23]->getId() . '/p5.jpg');

    }
}

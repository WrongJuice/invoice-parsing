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
            for($y = 0; $y < 5; $y++){
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
        for($y = 0; $y < 5; $y++){
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

        // Crée 1 BD humour Tendance
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
        for($y = 0; $y < 5; $y++){
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



        $manager->flush();

    }
}

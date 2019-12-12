<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\BandeDessinee;
use App\Entity\Commentaire;
use App\Entity\Notes;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

//        /* ----------------------LES BD --------------------------*/
//
//        // Crée 10 BD de type BD Humour avec 5 planches
//        for ($i = 0; $i < 10; $i++){
//            $BandeDessinee= new BandeDessinee();
//            $BandeDessinee->setTitre('BD Humour avec 5 planches '.$i);
//            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $BandeDessinee->setAuteur('Auteur '.$i);
//            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $BandeDessinee->setGenre('BD');
//            $BandeDessinee->setSousGenre('Humour');
//            $BandeDessinee->setAffiche('/img/affiche_testBD.jpg');
//            $BandeDessinee->setLivrePDF('/pdf/BD_test.pdf');
//            $BandeDessinee->setPlanche1('/img/planche1.jpg');
//            $BandeDessinee->setPlanche2('/img/planche2.jpg');
//            $BandeDessinee->setPlanche3('/img/planche3.jpg');
//            $BandeDessinee->setPlanche4('/img/planche4.jpg');
//            $BandeDessinee->setPlanche5('/img/planche5.jpg');
//
//            $manager->persist($BandeDessinee);
//
//              // Crée 4 commentaires pour la BD et les lie
//              for ($y = 0; $y < 4; $y++){
//                  $commentaire= new Commentaire();
//                  $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                  $commentaire->setContenu('Commentaire '.$i.$y);
//                  $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                  $commentaire->setSaBandeDessinee($BandeDessinee);
//                  $manager->persist($commentaire);
//              }
//
//              // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 4; $y++){
//                $note = new Notes();
//                $note->setValeur($y);
//                $note->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($note);
//            }
//
//        }
//
//        // Crée 10 BD de type BD Policier avec 3 planches et Tendance
//        for ($i = 0; $i < 10; $i++){
//            $BandeDessinee= new BandeDessinee();
//            $BandeDessinee->setTitre('BD Policier Tendance avec 3 planches '.$i);
//            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $BandeDessinee->setAuteur('Auteur '.$i);
//            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $BandeDessinee->setGenre('BD');
//            $BandeDessinee->setSousGenre('Policier');
//            $BandeDessinee->setAffiche('/img/affiche_testBD.jpg');
//            $BandeDessinee->setLivrePDF('/pdf/BD_test.pdf');
//            $BandeDessinee->setPlanche1('/img/planche1.jpg');
//            $BandeDessinee->setPlanche2('/img/planche2.jpg');
//            $BandeDessinee->setPlanche3('/img/planche3.jpg');
//            $manager->persist($BandeDessinee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 15; $y++) {
//                $note = new Notes();
//                $note->setValeur(5);
//                $note->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($note);
//            }
//
//        }
//
//        // Crée 5 BD de type BD Aventure avec 0 planches, Note de 4 Mais trop vieilles : Non tendance
//        for ($i = 0; $i < 5; $i++){
//            $BandeDessinee= new BandeDessinee();
//            $BandeDessinee->setTitre('BD Aventure Trop vieille avec 0 planches '.$i);
//            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $BandeDessinee->setAuteur('Auteur '.$i);
//            $BandeDessinee->setDateDeParution(new \DateTime('2010-01-01 00:00:00'));
//            $BandeDessinee->setGenre('BD');
//            $BandeDessinee->setSousGenre('Aventure');
//            $BandeDessinee->setAffiche('/img/affiche_testBD.jpg');
//            $BandeDessinee->setLivrePDF('/pdf/BD_test.pdf');
//            $manager->persist($BandeDessinee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 15 notes pour la BD et les lie
//            for($y = 0; $y < 15; $y++) {
//                $note = new Notes();
//                $note->setValeur(5);
//                $note->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($note);
//            }
//
//        }
//
//
//        /* ----------------------Les Comics --------------------------*/
//
//        // Crée 10 BD de type Comics Super-Heros avec 5 planches
//        for ($i = 0; $i < 10; $i++){
//            $BandeDessinee= new BandeDessinee();
//            $BandeDessinee->setTitre('Comics Super-Heros avec 5 planches '.$i);
//            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire !'.$i);
//            $BandeDessinee->setAuteur('Auteur '.$i);
//            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $BandeDessinee->setGenre('Comics');
//            $BandeDessinee->setSousGenre('Super-Heros');
//            $BandeDessinee->setAffiche('/img/affiche_testComics.jpg');
//            $BandeDessinee->setLivrePDF('/pdf/BD_test.pdf');
//            $BandeDessinee->setPlanche1('/img/planche1.jpg');
//            $BandeDessinee->setPlanche2('/img/planche2.jpg');
//            $BandeDessinee->setPlanche3('/img/planche3.jpg');
//            $BandeDessinee->setPlanche4('/img/planche4.jpg');
//            $BandeDessinee->setPlanche5('/img/planche5.jpg');
//            $manager->persist($BandeDessinee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 4; $y++) {
//                $note = new Notes();
//                $note->setValeur($y);
//                $note->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($note);
//            }
//
//        }
//
//
//        // Crée 10 BD de type Comics Historique et Tendance avec 2 planches
//        for ($i = 0; $i < 10; $i++){
//            $BandeDessinee= new BandeDessinee();
//            $BandeDessinee->setTitre('Comics Historique Tendance avec 2 planches '.$i);
//            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $BandeDessinee->setAuteur('Auteur '.$i);
//            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $BandeDessinee->setGenre('Comics');
//            $BandeDessinee->setSousGenre('Historique');
//            $BandeDessinee->setAffiche('/img/affiche_testComics.jpg');
//            $BandeDessinee->setLivrePDF('/pdf/BD_test.pdf');
//            $BandeDessinee->setPlanche1('/img/planche1.jpg');
//            $BandeDessinee->setPlanche2('/img/planche2.jpg');
//            $manager->persist($BandeDessinee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 15; $y++) {
//                $note = new Notes();
//                $note->setValeur(4);
//                $note->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($note);
//            }
//
//        }
//        /* ----------------------Les Mangas --------------------------*/
//
//        // Crée 10 BD de type Manga Divers avec 5 planches
//        for ($i = 0; $i < 10; $i++){
//            $BandeDessinee= new BandeDessinee();
//            $BandeDessinee->setTitre('Manga Divers avec 5 planches '.$i);
//            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $BandeDessinee->setAuteur('Auteur '.$i);
//            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $BandeDessinee->setGenre('Mangas');
//            $BandeDessinee->setSousGenre('Divers');
//            $BandeDessinee->setAffiche('/img/affiche_testManga.jpg');
//            $BandeDessinee->setLivrePDF('/pdf/BD_test.pdf');
//            $BandeDessinee->setPlanche1('/img/planche1.jpg');
//            $BandeDessinee->setPlanche2('/img/planche2.jpg');
//            $BandeDessinee->setPlanche3('/img/planche3.jpg');
//            $BandeDessinee->setPlanche4('/img/planche4.jpg');
//            $BandeDessinee->setPlanche5('/img/planche5.jpg');
//            $manager->persist($BandeDessinee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 4; $y++) {
//                $note = new Notes();
//                $note->setValeur($y);
//                $note->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($note);
//            }
//
//        }
//
//
//        // Crée 10 BD de type Mangas Fantasy et Tendance avec 1 planche
//        for ($i = 0; $i < 10; $i++){
//            $BandeDessinee= new BandeDessinee();
//            $BandeDessinee->setTitre('Manga Fantasy Tendance avec 1 planche '.$i);
//            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $BandeDessinee->setAuteur('Auteur '.$i);
//            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $BandeDessinee->setGenre('Mangas');
//            $BandeDessinee->setSousGenre('Fantasy');
//            $BandeDessinee->setAffiche('/img/affiche_testManga.jpg');
//            $BandeDessinee->setLivrePDF('/pdf/BD_test.pdf');
//            $BandeDessinee->setPlanche1('/img/planche1.jpg');
//            $manager->persist($BandeDessinee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 15; $y++) {
//                $note = new Notes();
//                $note->setValeur(4);
//                $note->setSaBandeDessinee($BandeDessinee);
//                $manager->persist($note);
//            }
//
//        }
//
//
//
//
//        $manager->flush();

    }
}

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

        /* ----------------------LES BD --------------------------*/

//        $repository = $manager->getRepository('App\Entity\BandeDessinee');
//
//         //Crée 10 BD de type BD Humour avec 5 planches
//        for ($i = 0; $i < 10; $i++){
//            $uneBandeDessinnee= new BandeDessinee();
//            $uneBandeDessinnee->setTitre('BD Humour avec 5 planches '.$i);
//            $uneBandeDessinnee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $uneBandeDessinnee->setAuteur('Auteur '.$i);
//            $uneBandeDessinnee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $uneBandeDessinnee->setGenre('BD');
//            $uneBandeDessinnee->setSousGenre('Humour');
//            $manager->persist($uneBandeDessinnee);
//
//              // Crée 4 commentaires pour la BD et les lie
//              for ($y = 0; $y < 4; $y++){
//                  $commentaire= new Commentaire();
//                  $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                  $commentaire->setContenu('Commentaire '.$i.$y);
//                  $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                  $commentaire->setSaBandeDessinee($uneBandeDessinnee);
//                  $manager->persist($commentaire);
//              }
//
//              // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 4; $y++){
//                $note = new Notes();
//                $note->setValeur($y);
//                $note->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($note);
//            }
//
//
//        }
//
//        // Crée 10 BD de type BD Policier avec 3 planches et Tendance
//        for ($i = 0; $i < 10; $i++){
//            $uneBandeDessinnee= new BandeDessinee();
//            $uneBandeDessinnee->setTitre('BD Policier Tendance avec 3 planches '.$i);
//            $uneBandeDessinnee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $uneBandeDessinnee->setAuteur('Auteur '.$i);
//            $uneBandeDessinnee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $uneBandeDessinnee->setGenre('BD');
//            $uneBandeDessinnee->setSousGenre('Policier');
//            $manager->persist($uneBandeDessinnee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 15; $y++) {
//                $note = new Notes();
//                $note->setValeur(5);
//                $note->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($note);
//            }
//        }
//
//        // Crée 5 BD de type BD Aventure avec 0 planches, Note de 4 Mais trop vieilles : Non tendance
//        for ($i = 0; $i < 5; $i++){
//            $uneBandeDessinnee= new BandeDessinee();
//            $uneBandeDessinnee->setTitre('BD Aventure Trop vieille avec 0 planches '.$i);
//            $uneBandeDessinnee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $uneBandeDessinnee->setAuteur('Auteur '.$i);
//            $uneBandeDessinnee->setDateDeParution(new \DateTime('2010-01-01 00:00:00'));
//            $uneBandeDessinnee->setGenre('BD');
//            $uneBandeDessinnee->setSousGenre('Aventure');
//            $manager->persist($uneBandeDessinnee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 15 notes pour la BD et les lie
//            for($y = 0; $y < 15; $y++) {
//                $note = new Notes();
//                $note->setValeur(5);
//                $note->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($note);
//            }
//        }
//
//
//        /* ----------------------Les Comics --------------------------*/
//
//        // Crée 10 BD de type Comics Super-Heros avec 5 planches
//        for ($i = 0; $i < 10; $i++){
//            $uneBandeDessinnee= new BandeDessinee();
//            $uneBandeDessinnee->setTitre('Comics Super-Heros avec 5 planches '.$i);
//            $uneBandeDessinnee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire !'.$i);
//            $uneBandeDessinnee->setAuteur('Auteur '.$i);
//            $uneBandeDessinnee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $uneBandeDessinnee->setGenre('Comics');
//            $uneBandeDessinnee->setSousGenre('Super-Heros');
//            $manager->persist($uneBandeDessinnee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 4; $y++) {
//                $note = new Notes();
//                $note->setValeur($y);
//                $note->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($note);
//            }
//        }
//
//
//        // Crée 10 BD de type Comics Historique et Tendance avec 2 planches
//        for ($i = 0; $i < 10; $i++){
//            $uneBandeDessinnee= new BandeDessinee();
//            $uneBandeDessinnee->setTitre('Comics Historique Tendance avec 2 planches '.$i);
//            $uneBandeDessinnee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $uneBandeDessinnee->setAuteur('Auteur '.$i);
//            $uneBandeDessinnee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $uneBandeDessinnee->setGenre('Comics');
//            $uneBandeDessinnee->setSousGenre('Historique');
//            $manager->persist($uneBandeDessinnee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 15; $y++) {
//                $note = new Notes();
//                $note->setValeur(4);
//                $note->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($note);
//            }
//        }
//
//
//        /* ----------------------Les Mangas --------------------------*/
//
//        // Crée 10 BD de type Manga Divers avec 5 planches
//        for ($i = 0; $i < 10; $i++){
//            $uneBandeDessinnee= new BandeDessinee();
//            $uneBandeDessinnee->setTitre('Manga Divers avec 5 planches '.$i);
//            $uneBandeDessinnee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $uneBandeDessinnee->setAuteur('Auteur '.$i);
//            $uneBandeDessinnee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $uneBandeDessinnee->setGenre('Mangas');
//            $uneBandeDessinnee->setSousGenre('Divers');
//            $manager->persist($uneBandeDessinnee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 4; $y++) {
//                $note = new Notes();
//                $note->setValeur($y);
//                $note->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($note);
//            }
//        }
//
//
//        // Crée 10 BD de type Mangas Fantasy et Tendance avec 1 planche
//        for ($i = 0; $i < 10; $i++){
//            $uneBandeDessinnee= new BandeDessinee();
//            $uneBandeDessinnee->setTitre('Manga Fantasy Tendance avec 1 planche '.$i);
//            $uneBandeDessinnee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
//            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
//            $uneBandeDessinnee->setAuteur('Auteur '.$i);
//            $uneBandeDessinnee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
//            $uneBandeDessinnee->setGenre('Mangas');
//            $uneBandeDessinnee->setSousGenre('Fantasy');
//            $manager->persist($uneBandeDessinnee);
//
//            // Crée 4 commentaires pour la BD et les lie
//            for ($y = 0; $y < 4; $y++){
//                $commentaire= new Commentaire();
//                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
//                $commentaire->setContenu('Commentaire '.$i.$y);
//                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
//                $commentaire->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($commentaire);
//            }
//
//            // Crée 4 notes pour la BD et les lie
//            for($y = 0; $y < 15; $y++) {
//                $note = new Notes();
//                $note->setValeur(4);
//                $note->setSaBandeDessinee($uneBandeDessinnee);
//                $manager->persist($note);
//            }
//        }
//
//        $manager->flush();
//
//        $lesBandeDessinnees = $repository->findBy(array('Genre' => 'BD' , 'SousGenre' => 'Humour'));
//        foreach ($lesBandeDessinnees as $uneBandeDessinnee) {
//            mkdir('public/data/' . $uneBandeDessinnee->getId(),755);
//            copy('public/data_fixtures/affiche_testBD.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/affiche.jpg');
//            copy('public/data_fixtures/BD_test.pdf' , 'public/data/' . $uneBandeDessinnee->getId() . '/livre.pdf');
//            copy('public/data_fixtures/planche1.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p1.jpg');
//            copy('public/data_fixtures/planche2.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p2.jpg');
//            copy('public/data_fixtures/planche3.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p3.jpg');
//            copy('public/data_fixtures/planche4.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p4.jpg');
//            copy('public/data_fixtures/planche5.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p5.jpg');
//        }
//
//        $lesBandeDessinnees = $repository->findBy(array('Genre' => 'BD' , 'SousGenre' => 'Policier'));
//        foreach ($lesBandeDessinnees as $uneBandeDessinnee) {
//            mkdir('public/data/' . $uneBandeDessinnee->getId(),755);
//            copy('public/data_fixtures/affiche_testBD.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/affiche.jpg');
//            copy('public/data_fixtures/BD_test.pdf' , 'public/data/' . $uneBandeDessinnee->getId() . '/livre.pdf');
//            copy('public/data_fixtures/planche1.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p1.jpg');
//            copy('public/data_fixtures/planche2.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p2.jpg');
//            copy('public/data_fixtures/planche3.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p3.jpg');
//        }
//
//        $lesBandeDessinnees = $repository->findBy(array('Genre' => 'BD' , 'SousGenre' => 'Aventure'));
//        foreach ($lesBandeDessinnees as $uneBandeDessinnee) {
//            mkdir('public/data/' . $uneBandeDessinnee->getId(),755);
//            copy('public/data_fixtures/affiche_testBD.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/affiche.jpg');
//            copy('public/data_fixtures/BD_test.pdf' , 'public/data/' . $uneBandeDessinnee->getId() . '/livre.pdf');
//        }
//
//        $lesBandeDessinnees = $repository->findBy(array('Genre' => 'Comics' , 'SousGenre' => 'Super-Heros'));
//        foreach ($lesBandeDessinnees as $uneBandeDessinnee) {
//            mkdir('public/data/' . $uneBandeDessinnee->getId(),755);
//            copy('public/data_fixtures/affiche_testComics.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/affiche.jpg');
//            copy('public/data_fixtures/BD_test.pdf' , 'public/data/' . $uneBandeDessinnee->getId() . '/livre.pdf');
//            copy('public/data_fixtures/planche1.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p1.jpg');
//            copy('public/data_fixtures/planche2.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p2.jpg');
//            copy('public/data_fixtures/planche3.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p3.jpg');
//            copy('public/data_fixtures/planche4.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p4.jpg');
//            copy('public/data_fixtures/planche5.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p5.jpg');
//        }
//
//        $lesBandeDessinnees = $repository->findBy(array('Genre' => 'Comics' , 'SousGenre' => 'Historique'));
//        foreach ($lesBandeDessinnees as $uneBandeDessinnee) {
//            mkdir('public/data/' . $uneBandeDessinnee->getId(),755);
//            copy('public/data_fixtures/affiche_testComics.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/affiche.jpg');
//            copy('public/data_fixtures/BD_test.pdf' , 'public/data/' . $uneBandeDessinnee->getId() . '/livre.pdf');
//            copy('public/data_fixtures/planche1.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p1.jpg');
//            copy('public/data_fixtures/planche2.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p2.jpg');
//        }
//
//        $lesBandeDessinnees = $repository->findBy(array('Genre' => 'Mangas' , 'SousGenre' => 'Divers'));
//        foreach ($lesBandeDessinnees as $uneBandeDessinnee) {
//            mkdir('public/data/' . $uneBandeDessinnee->getId(),755);
//            copy('public/data_fixtures/affiche_testManga.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/affiche.jpg');
//            copy('public/data_fixtures/BD_test.pdf' , 'public/data/' . $uneBandeDessinnee->getId() . '/livre.pdf');
//            copy('public/data_fixtures/planche1.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p1.jpg');
//            copy('public/data_fixtures/planche2.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p2.jpg');
//            copy('public/data_fixtures/planche3.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p3.jpg');
//            copy('public/data_fixtures/planche4.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p4.jpg');
//            copy('public/data_fixtures/planche5.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p5.jpg');
//        }
//
//        $lesBandeDessinnees = $repository->findBy(array('Genre' => 'Mangas' , 'SousGenre' => 'Fantasy'));
//        foreach ($lesBandeDessinnees as $uneBandeDessinnee) {
//            mkdir('public/data/' . $uneBandeDessinnee->getId(),755);
//            copy('public/data_fixtures/affiche_testManga.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/affiche.jpg');
//            copy('public/data_fixtures/BD_test.pdf' , 'public/data/' . $uneBandeDessinnee->getId() . '/livre.pdf');
//            copy('public/data_fixtures/planche1.jpg' , 'public/data/' . $uneBandeDessinnee->getId() . '/p1.jpg');
//        }
      }
}

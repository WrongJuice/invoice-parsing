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

        // Crée 10 BD de type BD Humour
        for ($i = 0; $i < 10; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('BD Humour '.$i);
            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
            $BandeDessinee->setAuteur('Auteur '.$i);
            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
            $BandeDessinee->setGenre('BD');
            $BandeDessinee->setSousGenre('Humour');
            $manager->persist($BandeDessinee);

              // Crée 4 commentaires pour la BD et les lie
              for ($y = 0; $y < 4; $y++){
                  $commentaire= new Commentaire();
                  $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
                  $commentaire->setContenu('Commentaire '.$i.$y);
                  $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
                  $commentaire->setSaBandeDessinee($BandeDessinee);
                  $manager->persist($commentaire);
              }

              // Crée 4 notes pour la BD et les lie
            for($y = 0; $y < 4; $y++){
                $note = new Notes();
                $note->setValeur($y);
                $note->setSaBandeDessinee($BandeDessinee);
                $manager->persist($note);
            }

        }

        // Crée 10 BD de type BD Policier et Tendance
        for ($i = 0; $i < 10; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('BD Policier Tendance '.$i);
            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
            $BandeDessinee->setAuteur('Auteur '.$i);
            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
            $BandeDessinee->setGenre('BD');
            $BandeDessinee->setSousGenre('Policier');
            $manager->persist($BandeDessinee);

            // Crée 4 commentaires pour la BD et les lie
            for ($y = 0; $y < 4; $y++){
                $commentaire= new Commentaire();
                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
                $commentaire->setContenu('Commentaire '.$i.$y);
                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
                $commentaire->setSaBandeDessinee($BandeDessinee);
                $manager->persist($commentaire);
            }

            // Crée 4 notes pour la BD et les lie
            for($y = 0; $y < 15; $y++) {
                $note = new Notes();
                $note->setValeur(5);
                $note->setSaBandeDessinee($BandeDessinee);
                $manager->persist($note);
            }

        }

        // Crée 5 BD de type BD Aventure, Note de 4 Mais trop vieilles : Non tendance
        for ($i = 0; $i < 5; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('BD Aventure Trop vieille '.$i);
            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
            $BandeDessinee->setAuteur('Auteur '.$i);
            $BandeDessinee->setDateDeParution(new \DateTime('2010-01-01 00:00:00'));
            $BandeDessinee->setGenre('BD');
            $BandeDessinee->setSousGenre('Aventure');
            $manager->persist($BandeDessinee);

            // Crée 4 commentaires pour la BD et les lie
            for ($y = 0; $y < 4; $y++){
                $commentaire= new Commentaire();
                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
                $commentaire->setContenu('Commentaire '.$i.$y);
                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
                $commentaire->setSaBandeDessinee($BandeDessinee);
                $manager->persist($commentaire);
            }

            // Crée 15 notes pour la BD et les lie
            for($y = 0; $y < 15; $y++) {
                $note = new Notes();
                $note->setValeur(5);
                $note->setSaBandeDessinee($BandeDessinee);
                $manager->persist($note);
            }

        }


        /* ----------------------Les Comics --------------------------*/

        // Crée 10 BD de type Comics Super-Heros
        for ($i = 0; $i < 10; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('Comics Super-Heros '.$i);
            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire !'.$i);
            $BandeDessinee->setAuteur('Auteur '.$i);
            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
            $BandeDessinee->setGenre('Comics');
            $BandeDessinee->setSousGenre('Super-Heros');
            $manager->persist($BandeDessinee);

            // Crée 4 commentaires pour la BD et les lie
            for ($y = 0; $y < 4; $y++){
                $commentaire= new Commentaire();
                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
                $commentaire->setContenu('Commentaire '.$i.$y);
                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
                $commentaire->setSaBandeDessinee($BandeDessinee);
                $manager->persist($commentaire);
            }

            // Crée 4 notes pour la BD et les lie
            for($y = 0; $y < 4; $y++) {
                $note = new Notes();
                $note->setValeur($y);
                $note->setSaBandeDessinee($BandeDessinee);
                $manager->persist($note);
            }

        }


        // Crée 10 BD de type Comics Historique et Tendance
        for ($i = 0; $i < 10; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('Comics Historique Tendance '.$i);
            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
            $BandeDessinee->setAuteur('Auteur '.$i);
            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
            $BandeDessinee->setGenre('Comics');
            $BandeDessinee->setSousGenre('Historique');
            $manager->persist($BandeDessinee);

            // Crée 4 commentaires pour la BD et les lie
            for ($y = 0; $y < 4; $y++){
                $commentaire= new Commentaire();
                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
                $commentaire->setContenu('Commentaire '.$i.$y);
                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
                $commentaire->setSaBandeDessinee($BandeDessinee);
                $manager->persist($commentaire);
            }

            // Crée 4 notes pour la BD et les lie
            for($y = 0; $y < 15; $y++) {
                $note = new Notes();
                $note->setValeur(4);
                $note->setSaBandeDessinee($BandeDessinee);
                $manager->persist($note);
            }

        }
        /* ----------------------Les Mangas --------------------------*/

        // Crée 10 BD de type Manga Divers
        for ($i = 0; $i < 10; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('Manga Divers '.$i);
            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
            $BandeDessinee->setAuteur('Auteur '.$i);
            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
            $BandeDessinee->setGenre('Mangas');
            $BandeDessinee->setSousGenre('Divers');
            $manager->persist($BandeDessinee);

            // Crée 4 commentaires pour la BD et les lie
            for ($y = 0; $y < 4; $y++){
                $commentaire= new Commentaire();
                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
                $commentaire->setContenu('Commentaire '.$i.$y);
                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
                $commentaire->setSaBandeDessinee($BandeDessinee);
                $manager->persist($commentaire);
            }

            // Crée 4 notes pour la BD et les lie
            for($y = 0; $y < 4; $y++) {
                $note = new Notes();
                $note->setValeur($y);
                $note->setSaBandeDessinee($BandeDessinee);
                $manager->persist($note);
            }

        }


        // Crée 10 BD de type Mangas Fantasy et Tendance
        for ($i = 0; $i < 10; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('Manga Fantasy Tendance '.$i);
            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
            $BandeDessinee->setAuteur('Auteur '.$i);
            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
            $BandeDessinee->setGenre('Mangas');
            $BandeDessinee->setSousGenre('Fantasy');
            $manager->persist($BandeDessinee);

            // Crée 4 commentaires pour la BD et les lie
            for ($y = 0; $y < 4; $y++){
                $commentaire= new Commentaire();
                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
                $commentaire->setContenu('Commentaire '.$i.$y);
                $commentaire->setDate(new \DateTime(date("Y-m-d H:i:s")));
                $commentaire->setSaBandeDessinee($BandeDessinee);
                $manager->persist($commentaire);
            }

            // Crée 4 notes pour la BD et les lie
            for($y = 0; $y < 15; $y++) {
                $note = new Notes();
                $note->setValeur(4);
                $note->setSaBandeDessinee($BandeDessinee);
                $manager->persist($note);
            }

        }


        $manager->flush();

    }
}

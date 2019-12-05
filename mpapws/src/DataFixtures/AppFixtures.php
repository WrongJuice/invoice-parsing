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
        // Crée 10 BD de type BD
        for ($i = 0; $i < 10; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('Bande Dessinée '.$i);
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

        // Crée 10 BD de type Comics
        for ($i = 0; $i < 10; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('Comics '.$i);
            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire !'.$i);
            $BandeDessinee->setAuteur('Auteur '.$i);
            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
            $BandeDessinee->setGenre('Comics');
            $BandeDessinee->setSousGenre('Heros');
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

        // Crée 10 BD de type Manga
        for ($i = 0; $i < 10; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('Manga '.$i);
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

        // Crée 5 BD de type BD et Tendance
        for ($i = 0; $i < 5; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('BD Tendance '.$i);
            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
            $BandeDessinee->setAuteur('Auteur '.$i);
            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
            $BandeDessinee->setGenre('BD');
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
                $note->setValeur(5);
                $note->setSaBandeDessinee($BandeDessinee);
                $manager->persist($note);
            }

        }

        // Crée 5 BD de type BD, Note de 4 Mais trop vieilles : Non tendance
        for ($i = 0; $i < 5; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('BD Trop vieille '.$i);
            $BandeDessinee->setDescription('Ceci est une description plus longue pour rendre les pages plus réaliste
            , A part ca la BD est tip top, c est ma première alors nhésitez pas a la lire ! '.$i);
            $BandeDessinee->setAuteur('Auteur '.$i);
            $BandeDessinee->setDateDeParution(new \DateTime('2010-01-01 00:00:00'));
            $BandeDessinee->setGenre('BD');
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
                $note->setValeur(5);
                $note->setSaBandeDessinee($BandeDessinee);
                $manager->persist($note);
            }

        }


        $manager->flush();

    }
}

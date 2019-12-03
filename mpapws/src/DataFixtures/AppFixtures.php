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
            $BandeDessinee->setDescription('Description '.$i);
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
                  $commentaire->setSaBandeDessinee($BandeDessinee);
                  $manager->persist($commentaire);
              }

              // Crée 4 notes pour la BD et les lie
            for($y = 0; $y < 4; $y++)
              $note = new Notes();
              $note->setValeur($y);
              $note->setSaBandeDessinee($BandeDessinee);
              $manager->persist($note);
        }

        // Crée 10 BD de type Comics
        for ($i = 0; $i < 10; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('Bande Dessinée '.$i);
            $BandeDessinee->setDescription('Description '.$i);
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
                $commentaire->setSaBandeDessinee($BandeDessinee);
                $manager->persist($commentaire);
            }

            // Crée 4 notes pour la BD et les lie
            for($y = 0; $y < 4; $y++)
                $note = new Notes();
            $note->setValeur($y);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        // Crée 10 BD de type Manga
        for ($i = 0; $i < 10; $i++){
            $BandeDessinee= new BandeDessinee();
            $BandeDessinee->setTitre('Bande Dessinée '.$i);
            $BandeDessinee->setDescription('Description '.$i);
            $BandeDessinee->setAuteur('Auteur '.$i);
            $BandeDessinee->setDateDeParution(new \DateTime(date("Y-m-d H:i:s")));
            $BandeDessinee->setGenre('Manga');
            $BandeDessinee->setSousGenre('Divers');
            $manager->persist($BandeDessinee);

            // Crée 4 commentaires pour la BD et les lie
            for ($y = 0; $y < 4; $y++){
                $commentaire= new Commentaire();
                $commentaire->setAuteur('Auteur de Commentaire '.$i.$y);
                $commentaire->setContenu('Commentaire '.$i.$y);
                $commentaire->setSaBandeDessinee($BandeDessinee);
                $manager->persist($commentaire);
            }

            // Crée 4 notes pour la BD et les lie
            for($y = 0; $y < 4; $y++)
                $note = new Notes();
            $note->setValeur($y);
            $note->setSaBandeDessinee($BandeDessinee);
            $manager->persist($note);
        }

        $manager->flush();

    }
}

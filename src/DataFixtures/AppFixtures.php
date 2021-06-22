<?php

namespace App\DataFixtures;

use App\Entity\Announce;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 20; $i++) {
            $announce = new Announce();
            $announce->setTitle("chambre n° $i")
                ->setSlug("chambre-$i")
                ->setDescription("Je vous loue ma chambre avec salle bain neuve...")
                ->setPrice(mt_rand(30000, 60000))
                ->setAddress("quartier $i")
                ->setCoverImage("https://via.placeholder.com/500x300")
                ->setRooms(mt_rand(0, 5))
                ->setIsAvailable(mt_rand(0, 1))
                ->setCreatedAt(new DateTime());

            $manager->persist($announce);  // Permet à Doctrine d'enregistrer l'annonce dans la DB
        }

        $manager->flush();   // Execute l'enregistrement des données persistées 
    }
}

<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Announce;
use App\Entity\Comment;
use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++) {
            $announce = new Announce();
            $announce->setTitle($faker->sentence(3, false))
                ->setIntroduction($faker->sentence())
                ->setDescription($faker->text(800))
                ->setPrice(mt_rand(30000, 60000))
                ->setAddress($faker->address())
                ->setCoverImage("https://picsum.photos/1200/350?random=" . mt_rand(1, 55000))
                ->setRooms(mt_rand(1, 5))
                ->setIsAvailable(mt_rand(0, 1))
                ->setCreatedAt($faker->dateTimeBetween('-12 month', 'now'));


            for ($j = 0; $j < mt_rand(0, 4); $j++) {
                $image = new Image();
                $image->setImageUrl("https://picsum.photos/650/450?random=" . mt_rand(1, 55000))
                    ->setDescription($faker->sentence(3, false));
                $announce->addImage($image);
            }

            for ($k = 0; $k < mt_rand(0, 14); $k++) {
                $comment = new Comment();
                $comment->setAuthor($faker->name())
                    ->setEmail($faker->email())
                    ->setContent($faker->text())
                    ->setCreatedAt($faker->dateTimeBetween('-3 month', 'now'));
                $announce->addComment($comment);
            }
            $manager->persist($announce);
        }

        $manager->flush();   // Execute l'enregistrement des données persistées 
    }
}

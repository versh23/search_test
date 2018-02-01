<?php

namespace App\DataFixtures;


use App\Entity\Address;
use App\Entity\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $batchSize = 1000;

        $faker = Factory::create('ru_RU');

        for ($i = 0; $i < 20000; $i++) {
            $place = new Place();
            $place->setName($faker->company);
            $place->setDescription($faker->realText());

            $address = new Address();
            $address->setCity($faker->city);
            $place->setAddress($address);

            $manager->persist($address);
            $manager->persist($place);

            if (($i % $batchSize) === 0) {
                $manager->flush();
                $manager->clear();
            }
        }

        $manager->flush();
        $manager->clear();

    }
}
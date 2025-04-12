<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $countries = json_decode(file_get_contents(__DIR__.'\..\..\assets\data\countries.json'), true);

        foreach ($countries as $c) {
            $country = new Country();
            $country->setName($c['name']);
            $country->setCode($c['code']);
            $country->setContinent($c['continent']);

            $manager->persist($country);
        }
        $manager->flush();
    }
}

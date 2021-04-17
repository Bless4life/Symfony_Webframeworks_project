<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Club;
use Faker\Factory;

class ClubFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create();
        $numClub = 5;

        for ($i=0; $i < $numClub; $i++) {
            $ClubName = $faker -> streetName;
            $member = $faker -> numberBetween();

            $club = new Club();
            $club -> setClubName($ClubName);
            $club -> setMember($member);

            $manager -> persist($club);

        }
        $manager->flush();
    }
}

<?php

namespace App\DataFixtures;

use App\Entity\Club;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Book;
use Faker\Factory;


class BookFixtures extends Fixture
{
    protected $faker;

    /**
     *
     * @param ObjectManager $manager
     */


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
    }

}

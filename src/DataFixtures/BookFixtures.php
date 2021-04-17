<?php

namespace App\DataFixtures;

use App\Entity\Book;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create();
        $numBooks = 12;

        for ($i=0; $i < $numBooks; $i++) {
            $title = $faker -> title;
            $author = $faker -> name;
            $ClubName = $faker -> streetName ;

            $book = new book();
            $book -> setTitle($title);
            $book -> setAuthor($author);



            $manager -> persist($book);
        }
        $manager -> flush();
    }
}

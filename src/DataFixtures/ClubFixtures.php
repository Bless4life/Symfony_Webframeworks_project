<?php

namespace App\DataFixtures;

use App\Entity\Club;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class ClubFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $comment1 = new Comment();
        $comment1->setAuthorName('Lani peters');
        $comment1->setContent('i suggest reading "Cold world" by "Peter Andrews". it is a really good book. ');
        $club = new Club();
        $comment1->setClub($club);

        $manager->persist($comment1);
        $manager->persist($club);
        $manager->flush();
    }
}

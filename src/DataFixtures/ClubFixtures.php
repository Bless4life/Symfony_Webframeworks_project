<?php

namespace App\DataFixtures;

use App\Entity\Club;
use App\Entity\Comment;
use App\Entity\SuggestBook;
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
        $comment1->setAuthorName('User');
        $comment1->setContent('i suggest reading "Cold world" by "Peter Andrews". it is a really good book. ');
        $club = new Club();
        $club->setName('Happy Club');
        $comment1->setClub($club);

        $club->addComment($comment1);
        $club->setName($club);

        $suggest_book = new SuggestBook();
        $suggest_book->setBookName('Hello World');
        $suggest_book->setContext('I recommend this book');

        $manager->persist($suggest_book);
        $manager->persist($comment1);
        $manager->persist($club);

        $manager->flush();
    }
}

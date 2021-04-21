<?php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    // /**
    //  * @return Book[] Returns an array of Book objects
    //  */

    public function findByTitleOrder()
    {
        return $this->createQueryBuilder('b')

            ->orderBy('b.title', 'ASC')

            ->getQuery()
            ->getResult()
            ;
    }

    public function findByAuthorOrder()
    {
        return $this->createQueryBuilder('b')

            ->orderBy('b.author', 'ASC')

            ->getQuery()
            ->getResult()
            ;
    }
    public function findByClubNameOrder()
    {
        return $this->createQueryBuilder('b')

            ->orderBy('b.club_name', 'ASC')

            ->getQuery()
            ->getResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?Book
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

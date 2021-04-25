<?php

namespace App\Repository;

use App\Entity\SuggestBook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SuggestBook|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuggestBook|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuggestBook[]    findAll()
 * @method SuggestBook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuggestBookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuggestBook::class);
    }

    // /**
    //  * @return SuggestBook[] Returns an array of SuggestBook objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SuggestBook
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

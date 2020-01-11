<?php

namespace App\Repository;

use App\Entity\ActivityCorrection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ActivityCorrection|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivityCorrection|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivityCorrection[]    findAll()
 * @method ActivityCorrection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityCorrectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActivityCorrection::class);
    }

    // /**
    //  * @return ActivityCorrection[] Returns an array of ActivityCorrection objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActivityCorrection
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

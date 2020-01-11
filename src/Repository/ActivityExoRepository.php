<?php

namespace App\Repository;

use App\Entity\ActivityExo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ActivityExo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivityExo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivityExo[]    findAll()
 * @method ActivityExo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityExoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActivityExo::class);
    }

    // /**
    //  * @return ActivityExo[] Returns an array of ActivityExo objects
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
    public function findOneBySomeField($value): ?ActivityExo
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

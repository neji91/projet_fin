<?php

namespace App\Repository;

use App\Entity\SuperRegion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SuperRegion|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuperRegion|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuperRegion[]    findAll()
 * @method SuperRegion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuperRegionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuperRegion::class);
    }

    // /**
    //  * @return SuperRegion[] Returns an array of SuperRegion objects
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
    public function findOneBySomeField($value): ?SuperRegion
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

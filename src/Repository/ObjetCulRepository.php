<?php

namespace App\Repository;

use App\Entity\ObjetCul;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ObjetCul|null find($id, $lockMode = null, $lockVersion = null)
 * @method ObjetCul|null findOneBy(array $criteria, array $orderBy = null)
 * @method ObjetCul[]    findAll()
 * @method ObjetCul[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjetCulRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ObjetCul::class);
    }

    // /**
    //  * @return ObjetCul[] Returns an array of ObjetCul objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ObjetCul
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\DashBoard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DashBoard|null find($id, $lockMode = null, $lockVersion = null)
 * @method DashBoard|null findOneBy(array $criteria, array $orderBy = null)
 * @method DashBoard[]    findAll()
 * @method DashBoard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DashBoardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DashBoard::class);
    }

    // /**
    //  * @return DashBoard[] Returns an array of DashBoard objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DashBoard
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

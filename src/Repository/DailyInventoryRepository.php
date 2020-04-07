<?php

namespace App\Repository;

use App\Entity\DailyInventory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DailyInventory|null find($id, $lockMode = null, $lockVersion = null)
 * @method DailyInventory|null findOneBy(array $criteria, array $orderBy = null)
 * @method DailyInventory[]    findAll()
 * @method DailyInventory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DailyInventoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DailyInventory::class);
    }

    // /**
    //  * @return DailyInventory[] Returns an array of DailyInventory objects
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
    public function findOneBySomeField($value): ?DailyInventory
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

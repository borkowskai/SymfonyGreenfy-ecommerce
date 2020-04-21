<?php

namespace App\Repository;

use App\Entity\Flower;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Flower|null find($id, $lockMode = null, $lockVersion = null)
 * @method Flower|null findOneBy(array $criteria, array $orderBy = null)
 * @method Flower[]    findAll()
 * @method Flower[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @method Flower[]    findByX(FlowerFilterCriteria $flowerFilterCriteria)
 */
class FlowerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Flower::class);
    }

    public function findByX(FlowerFilterCriteria $flowerFilterCriteria)
    {

        $lowerPrice = $flowerFilterCriteria->getLowerPrice();
        $higherPrice = $flowerFilterCriteria->getHigherPrice();
        $colorIds = $flowerFilterCriteria->getColorIds();
        $plantTypeIds = $flowerFilterCriteria->getPlantTypeIds();

        if (is_null($lowerPrice) and is_null($higherPrice) and empty($colorIds) and empty($plantTypeIds))
        {
            return $this->findAll();
        }

        $qb = $this->createQueryBuilder('flower');

        if (!is_null($lowerPrice))
        {
            $qb->andWhere('flower.priceExclVAT >= :lowerPrice')
               ->setParameter('lowerPrice', $lowerPrice);
        }

        if (!is_null($higherPrice))
        {
            $qb->andWhere('flower.priceExclVAT <= :higherPrice')
               ->setParameter('higherPrice', $higherPrice);
        }

        if (!empty($colorIds))
        {
            $qb->andWhere('flower.color IN (:colorIds)')
               ->setParameter('colorIds', $colorIds);
        }

        if (!empty($plantTypeIds))
        {
            $qb->andWhere('flower.plantType IN (:plantTypeIds)')
               ->setParameter('plantTypeIds', $plantTypeIds);
        }

        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return Flower[] Returns an array of Flower objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Flower
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

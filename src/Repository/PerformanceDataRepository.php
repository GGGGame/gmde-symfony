<?php

namespace App\Repository;

use App\Entity\PerformanceData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PerformanceData>
 */
class PerformanceDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PerformanceData::class);
    }

    public function findOneByFields(array $data): ?PerformanceData
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.rangeFT1 = :rangeFT1')
            ->andWhere('p.rangeCityFT1 = :rangeCityFT1')
            ->andWhere('p.rangeHighwayFT1 = :rangeHighwayFT1')
            ->andWhere('p.unadjustedCityMpgFT1 = :unadjustedCityMpgFT1')
            ->andWhere('p.unadjustedHighwayMpgFT1 = :unadjustedHighwayMpgFT1')
            ->setParameter('rangeFT1', $data['rangeForFuelType1'])
            ->setParameter('rangeCityFT1', $data['rangeCityForFuelType1'])
            ->setParameter('rangeHighwayFT1', $data['rangeHighwayForFuelType1'])
            ->setParameter('unadjustedCityMpgFT1', $data['unadjustedCityMpgForFuelType1'])
            ->setParameter('unadjustedHighwayMpgFT1', $data['unadjustedHighwayMpgForFuelType1'])
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
//     * @return PerformanceData[] Returns an array of PerformanceData objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PerformanceData
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

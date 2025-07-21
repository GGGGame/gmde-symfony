<?php

namespace App\Repository;

use App\Entity\FuelSpecification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FuelSpecification>
 */
class FuelSpecificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FuelSpecification::class);
    }

    public function findOneByFields(array $data): ?FuelSpecification
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.fuelType = :fuelType')
            ->andWhere('f.fuelType1 = :fuelTP1')
            ->andWhere('f.fuelType2 = :fuelTP2')
            ->andWhere('f.cityMpgFT1 = :cityMpgFT1')
            ->andWhere('f.combinedMpgFT1 = :combinedMpgFT1')
            ->setParameter('fuelType', $data['fuelType'] ?? null)
            ->setParameter('fuelTP1', $data['fuelType1'] ?? null)
            ->setParameter('fuelTP2', $data['fuelType2'] ?? null)
            ->setParameter('cityMpgFT1', $data['cityMpgForFuelType1'] ?? null)
            ->setParameter('combinedMpgFT1', $data['combinedMpgForFuelType1'] ?? null)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
//     * @return FuelSpecification[] Returns an array of FuelSpecification objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FuelSpecification
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

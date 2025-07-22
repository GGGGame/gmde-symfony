<?php

namespace App\Repository;

use App\Entity\ElectricSpecification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ElectricSpecification>
 */
class ElectricSpecificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElectricSpecification::class);
    }

    public function findOneByFields(array $data): ?ElectricSpecification
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.timeToCharge120V = :timeToCharge120V')
            ->andWhere('e.timeToCharge240V = :timeToCharge240V')
            ->andWhere('e.mfrCode = :mfrCode')
            ->andWhere('e.electricMotor = :electricMotor')
            ->setParameter('timeToCharge120V', $data['timeToChargeAt120V'])
            ->setParameter('timeToCharge240V', $data['timeToChargeAt240V'])
            ->setParameter('mfrCode', $data['mFRCode'])
            ->setParameter('electricMotor', $data['electricMotor'])
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
//     * @return ElectricSpecification[] Returns an array of ElectricSpecification objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ElectricSpecification
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

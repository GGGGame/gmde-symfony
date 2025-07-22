<?php

namespace App\Repository;

use App\Entity\VehicleDimensions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VehicleDimensions>
 */
class VehicleDimensionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehicleDimensions::class);
    }

    public function findOneByFields(array $data): ?VehicleDimensions
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.hatchbackLuggageVolume = :hatchbackLuggageVolume')
            ->andWhere('v.hatchbackPassengerVolume = :hatchbackPassengerVolume')
            ->andWhere('v.twoDoorLuggageVolume = :twoDoorLuggageVolume')
            ->andWhere('v.fourDoorLuggageVolume = :fourDoorLuggageVolume')
            ->setParameter('hatchbackLuggageVolume', $data['hatchbackLuggageVolume'])
            ->setParameter('hatchbackPassengerVolume', $data['hatchbackPassengerVolume'])
            ->setParameter('twoDoorLuggageVolume', $data['2DoorLuggageVolume'])
            ->setParameter('fourDoorLuggageVolume', $data['4DoorLuggageVolume'])
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
//     * @return VehicleDimensions[] Returns an array of VehicleDimensions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VehicleDimensions
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

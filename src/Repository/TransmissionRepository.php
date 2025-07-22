<?php

namespace App\Repository;

use App\Entity\Transmission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Transmission>
 */
class TransmissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transmission::class);
    }

    public function findOneByFields(array $data): ?Transmission
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.transmission = :transmission')
            ->andWhere('t.transmissionDescriptor = :transmissionDescriptor')
            ->andWhere('t.tCharger = :tCharger')
            ->andWhere('t.sCharger = :sCharger')
            ->setParameter('transmission', $data['transmission'])
            ->setParameter('transmissionDescriptor', $data['transmissionDescriptor'] ?? null)
            ->setParameter('tCharger', $data['tCharger'] ?? null)
            ->setParameter('sCharger', $data['sCharger'] ?? null)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
//     * @return Transmission[] Returns an array of Transmission objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Transmission
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

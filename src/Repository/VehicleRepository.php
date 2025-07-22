<?php

namespace App\Repository;

use App\Entity\Vehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vehicle>
 */
class VehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicle::class);
    }

    public function findOneByFields(array $data): ?Vehicle
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.brand = :make')
            ->andWhere('v.model = :model')
            ->andWhere('v.year = :year')
            ->setParameter('make', $data['make'])
            ->setParameter('model', $data['model'])
            ->setParameter('year', $data['year'])
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function searchByModel(string $query, int $offset, int $limit): array
    {
        $qb = $this->createQueryBuilder('v');

        return $qb
            ->where($qb->expr()->like(
                $qb->expr()->lower('v.model'),
                $qb->expr()->lower(':query')
            ))
            ->setParameter('query', '%' . $query . '%')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->orderBy('v.brand', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function countByModel(string $query): int
    {
        $qb = $this->createQueryBuilder('v');

        return (int)$qb
            ->select($qb->expr()->countDistinct('v.id'))
            ->where($qb->expr()->like(
                $qb->expr()->lower('v.model'),
                $qb->expr()->lower(':query')
            ))
            ->setParameter('query', '%' . $query . '%')
            ->getQuery()
            ->getSingleScalarResult();
    }

//    /**
//     * @return Vehicle[] Returns an array of Vehicle objects
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

//    public function findOneBySomeField($value): ?Vehicle
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

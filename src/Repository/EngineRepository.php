<?php

namespace App\Repository;

use App\Entity\Engine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Engine>
 */
class EngineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Engine::class);
    }

    public function findOneByFields(array $data): ?Engine
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.cylinders = :cylinders')
            ->andWhere('e.engineDescriptor = :engineDescriptor')
            ->andWhere('e.displacement = :displacement')
            ->andWhere('e.epaModelTypeIndex = :epaModelTypeIndex')
            ->setParameter('cylinders', $data['cylinders'])
            ->setParameter('engineDescriptor', $data['engineDescriptor'])
            ->setParameter('displacement', $data['engineDisplacement'])
            ->setParameter('epaModelTypeIndex', $data['ePAModelTypeIndex'])
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

//    /**
//     * @return Engine[] Returns an array of Engine objects
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

//    public function findOneBySomeField($value): ?Engine
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

class BatchEntityPersister
{
    public function persist(iterable $entities, EntityManagerInterface $entityManager, int $batchSize): void
    {
        $i = 0;

        foreach ($entities as $entity) {
            $entityManager->persist($entity);
            $i++;

            if ($i % $batchSize === 0) {
                $entityManager->flush();
                $entityManager->clear();
            }
        }

        if ($i % $batchSize !== 0) {
            $entityManager->flush();
            $entityManager->clear();
        }
    }
}
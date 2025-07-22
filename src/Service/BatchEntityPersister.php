<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class BatchEntityPersister
{
    public function __construct(
        private LoggerInterface $logger,
        private EntityManagerInterface $entityManager
    ) {}

    public function persist(iterable $entities, int $batchSize): void
    {    
        foreach ($entities as $i => $entity) {
            try {
                $this->entityManager->persist($entity);
                
                if (($i + 1) % $batchSize === 0) {
                    $this->entityManager->flush();
                    $this->entityManager->clear();
                }
            } catch (\Exception $e) {
                $this->logger->error('Error persisting entity: ' . $e->getMessage());
            }
        }
        
        try {
            $this->entityManager->flush();
            $this->entityManager->clear();
        } catch (\Exception $e) {
            $this->logger->error('Error flushing final entity: ' . $e->getMessage());
        }
    }
}
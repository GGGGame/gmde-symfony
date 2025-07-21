<?php

namespace App\Service;

use App\Interface\ImportableEntityInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GenericImporter
{
    public function __construct(
        private LoggerInterface $logger,
        private BatchEntityPersister $batchEntityPersister,
        private EntityManagerInterface $entityManager,
        private StringNormalizer $stringNormalizer,
        private ValidatorInterface $validator
    )
    {
        
    }

    public function import(
        iterable $rows, 
        callable $factory,
        ?int $batchSize = 500
        ): array
    {
        $entities = [];
        $i = 0;
        foreach ($rows as $row) {
            try {
                $i++;
                // Normalizza le keys prima di creare Vehicle
                $row = $this->stringNormalizer->normalizeKey($row);
                $entity = $factory($row);

                if ($this->validator->validate($entity)) {
                    $entities[] = $entity;
                }

            } catch (\Exception $e) {
                $this->logger->error('Error during import: ' . $e->getMessage());
            }
        }

        if (!empty($entities)) {
            $this->batchEntityPersister->persist($entities, $this->entityManager, $batchSize);
        }

        return $entities;
    }
}
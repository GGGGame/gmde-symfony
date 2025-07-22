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
        ?int $batchSize = 100
        ): array
    {
        $batch = [];
        $importResult = new ImportResult();

        foreach ($rows as $row) {
            try {
                // Normalizza le keys prima di creare Vehicle
                $row = $this->stringNormalizer->normalizeKey($row);
                $entity = $factory($row);

                $validationResult = $this->validator->validate($entity);
                if (count($validationResult) === 0) {
                    $batch[] = $entity;
                    $importResult->addSuccess();

                    if (count($batch) > $batchSize) {
                        $this->batchEntityPersister->persist($batch, $batchSize);
                        $batch = [];

                        $this->logger->info(
                            "Importati {$importResult->getSuccessCount()} veicoli");
                        
                        gc_collect_cycles();
                    }
                } else {
                    foreach ($validationResult as $error) {
                        $importResult->addFailed($row, $error->getMessage());
                    }
                    $this->logger->error("Validazione fallita per: {$row}");
                }

            } catch (\Exception $e) {
                $this->logger->error('Error during import: ' . $e->getMessage());
                $importResult->addFailed($row, $error->getMessage());
            }
        }

        if (!empty($batch)) {
            $this->batchEntityPersister->persist($batch, $batchSize);
        }

        $this->logger->info("Import completato con {$importResult->getSuccessCount()} successi e " .
            count($importResult->getFailedRows()) . " errori.");

        return $batch;
    }
}
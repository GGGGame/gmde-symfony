<?php

namespace App\Service;

use App\Factory\VehicleFactory;
use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class VehicleImporter
{
    public function __construct(
        private VehicleFactory $vehicleFactory,
        private LoggerInterface $logger,
        private ValidatorInterface $validator,
        private BatchEntityPersister $batchEntityPersister,
        private EntityManagerInterface $entityManager
    )
    {
        
    }

    public function import(iterable $rows, ?int $batchSize = 500): ImportResult
    {
        $result = new ImportResult();
        $batch = [];
        
        foreach ($rows as $row) {
            try {
                $this->vehicleFactory->createVehicle($row);

                // if ($this->validator->validate($vehicle)) {
                //     $batch[] = $vehicle;

                //     if (count($batch) >= $batchSize) {
                //         $this->batchEntityPersister->persist($batch, $this->entityManager, $batchSize);
                //         $result->addSuccess(count($batch));
                //         $batch = [];
                //     }
                // } else {
                //     $result->addSkipped($row, 'Validation failed');
                // }
            } catch (\Exception $e) {
                $this->logger->error('Error during import: ' . $e->getMessage());
                $result->addFailed($row, $e->getMessage());
            }
        }

        if (!empty($batch)) {
            $this->batchEntityPersister->persist($batch, $this->entityManager, $batchSize);
            $result->addSuccess(count($batch));
        }

        return $result;
    }
}
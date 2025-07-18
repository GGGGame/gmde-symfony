<?php

namespace App\Service;

use App\Factory\VehicleFactory;
use App\Repository\VehicleRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class VehicleImporter
{
    public function __construct(
        private VehicleFactory $vehicleFactory,
        private LoggerInterface $logger,
        private ValidatorInterface $validator,
        private VehicleRepository $vehicleRepository
    )
    {
        
    }

    public function import(array $rows, ?int $batchSize = 500): ImportResult
    {
        $result = new ImportResult();
        $batch = [];

        try {
            foreach ($rows as $row) {
                $vehicle = $this->vehicleFactory->createVehicle($row);

                if ($this->validator->validate($vehicle)) {
                    $batch[] = $vehicle;

                    if (count($batch) >= $batchSize) {
                        
                    }
                }
            }
        } catch (\Exception $e) {
            $this->logger->error('Error during import: ' . $e->getMessage());
            $result->addFailed($row, $e->getMessage());
        }

        return $result;

    }
}
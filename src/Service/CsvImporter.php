<?php

namespace App\Service;

use App\Factory\EngineFactory;
use App\Factory\VehicleFactory;
use League\Csv\Reader;

class CsvImporter
{
    public function __construct(
        private VehicleFactory $vehicleFactory,
        private EngineFactory $engineFactory,
        private GenericImporter $genericImporter
    ) {}

    public function import(string $csvPath): void
    {
        $reader = Reader::createFromPath($csvPath, 'r')
                  ->setDelimiter(';')
                  ->setHeaderOffset(0);

        $engine = $this->genericImporter->import(
            $reader->getRecords(),
            fn($row) => $this->engineFactory->createEngine($row),
        );

        $vehicle = $this->genericImporter->import(
            $reader->getRecords(),
            fn($row) => $this->vehicleFactory->createVehicle($row, $engine),
        );
    }
}
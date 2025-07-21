<?php

namespace App\Service;

use App\Factory\EngineFactory;
use App\Factory\VehicleFactory;
use League\Csv\Reader;

class CsvImporter
{
    public function __construct(
        private GenericImporter $genericImporter,
        private VehicleCreator $vehicleCreator
    ) {}

    public function import(string $csvPath): void
    {
        $reader = Reader::createFromPath($csvPath, 'r')
                  ->setDelimiter(';')
                  ->setHeaderOffset(0);

        $this->genericImporter->import(
            $reader->getRecords(),
            fn($row) => $this->vehicleCreator->createCompleteVehicle($row)
        );
    }
}
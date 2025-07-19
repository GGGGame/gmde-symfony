<?php

namespace App\Service;


use League\Csv\Reader;

class CsvImporter
{
    public function __construct(
        private VehicleImporter $vehicleImporter
    ) {}

    public function import(string $csvPath): void
    {
        $reader = Reader::createFromPath($csvPath, 'r')
                  ->setDelimiter(';')
                  ->setHeaderOffset(0);

        $records = $reader->getRecords();

        $this->vehicleImporter->import($records);
    }
}
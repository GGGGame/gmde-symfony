<?php

namespace App\Service;

use App\Entity\ElectricSpecification;
use App\Entity\Engine;
use App\Entity\FuelSpecification;
use App\Entity\Vehicle;
use League\Csv\Reader;

class CsvImporter
{
    public function import(string $csvPath): void
    {
        $reader = Reader::createFromPath($csvPath, 'r');
        $reader->setHeaderOffSet(0);

        $records = $reader->getRecords();
        $batchSize = 100;
        $batch = [];

        $imported = 0;
        $errors = [];

        foreach ($records as $index => $row) {
        

        }
    }
}
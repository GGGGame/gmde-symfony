<?php

namespace App\Factory;

use App\Entity\Engine;
use App\Entity\Vehicle;
use DateTime;

class VehicleFactory
{
    public function createVehicle(array $data, array $engine): Vehicle
    {
        $vehicle = new Vehicle();

        $vehicle->setBrand($data['make'] ?? null);
        $vehicle->setModel($data['model'] ?? null);
        $vehicle->setYear($data['year'] ?? null);
        $vehicle->setBaseModel($data['baseModel'] ?? null);
        $vehicle->setVehicleSizeClass($data['vehicleSizeClass'] ?? null);
        $vehicle->setAtvType($data['atvType'] ?? null);
        $vehicle->setGuzzler($data['guzzler'] ?? null);
        $vehicle->setVehicleSaveSpend($data['youSave/Spend'] ?? null);
        $vehicle->setCreatedOn(new DateTime() ?? null);
        $vehicle->setModifiedOn(new DateTime() ?? null);
        foreach ($engine as $engineData) {
            $vehicle->setEngineSpecs($engineData);
        }
    
        return $vehicle;
    }
}
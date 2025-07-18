<?php

namespace App\Factory;

use App\Entity\Vehicle;

class VehicleFactory
{
    public function createVehicle(array $data): Vehicle
    {
        $vehicle = new Vehicle();
        $vehicle->setBrand($data['brand'] ?? null);
        $vehicle->setModel($data['model'] ?? null);
        $vehicle->setYear($data['year'] ?? null);
        $vehicle->setBaseModel($data['baseModel'] ?? null);
        $vehicle->setVehicleSizeClass($data['vehicleSizeClass'] ?? null);
        $vehicle->setAtvType($data['atvType'] ?? null);
        $vehicle->setGuzzler($data['guzzler'] ?? null);
        $vehicle->setVehicleSaveSpend($data['vehicleSaveSpend'] ?? null);
        $vehicle->setCreatedOn($data['createdOn'] ?? null);
        $vehicle->setModifiedOn($data['modifiedOn'] ?? null);

        return $vehicle;
    }
}
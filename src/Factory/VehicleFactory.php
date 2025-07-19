<?php

namespace App\Factory;

use App\Entity\Vehicle;
use App\Service\StringNormalizer;

class VehicleFactory
{
    public function __construct(
        private StringNormalizer $stringNormalizer
    ) {}

    public function createVehicle(array $data): Vehicle
    {
        $vehicle = new Vehicle();

        foreach ($data as $key => $value) {
            $key = $this->stringNormalizer->normalize($key);

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
        }

        dump($vehicle);
        return $vehicle;
    }
}
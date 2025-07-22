<?php

namespace App\Factory;

use App\Entity\ElectricSpecification;
use App\Entity\Engine;
use App\Entity\FuelSpecification;
use App\Entity\PerformanceData;
use App\Entity\Transmission;
use App\Entity\Vehicle;
use App\Entity\VehicleDimensions;
use DateTime;

class VehicleFactory
{
    public function createVehicle(
        array $data, 
        Engine $engine, 
        FuelSpecification $fuelSpecification,
        Transmission $transmission,
        VehicleDimensions $vehicleDimensions, 
        PerformanceData $performanceData,
        ElectricSpecification $electricSpecification,
    ): Vehicle
    {
        $vehicle = new Vehicle();

        $vehicle
            ->setBrand($data['make'] ?? null)
            ->setModel($data['model'] ?? null)
            ->setYear($data['year'] ?? null)
            ->setBaseModel($data['baseModel'] ?? null)
            ->setVehicleSizeClass($data['vehicleSizeClass'] ?? null)
            ->setAtvType($data['atvType'] ?? null)
            ->setGuzzler($data['guzzler'] ?? null)
            ->setVehicleSaveSpend($data['youSave/Spend'] ?? null)
            ->setCreatedOn(new DateTime() ?? null)
            ->setModifiedOn(new DateTime() ?? null)
            ->setEngineSpecs($engine ?? null)
            ->setFuelSpecs($fuelSpecification ?? null)
            ->setTransmissionSpecs($transmission ?? null)
            ->setDimensionSpecs($vehicleDimensions ?? null)
            ->setPerformanceSpecs($performanceData ?? null)
            ->setElectricSpecs($electricSpecification ?? null);
        
        return $vehicle;
    }
}
<?php

namespace App\Service;

use App\Entity\ElectricSpecification;
use App\Entity\Engine;
use App\Entity\FuelSpecification;
use App\Entity\PerformanceData;
use App\Entity\Transmission;
use App\Entity\Vehicle;
use App\Entity\VehicleDimensions;
use App\Factory\VehicleFactory;
use App\Repository\VehicleRepository;
use App\Service\Resolver\VehicleComponentsResolver;

class VehicleCreator
{
    public function __construct(
        private VehicleFactory $vehicleFactory,
        private VehicleRepository $vehicleRepository,
        private VehicleComponentsResolver $componentsResolver,

    ) {}

    public function createCompleteVehicle(array $row): Vehicle
    {
        $existingVehicle = $this->vehicleRepository->findOneByFields($row);
        if ($existingVehicle) {
            return $existingVehicle;
        }

        $engine = $this->componentsResolver->resolve(Engine::class, $row);
        $fuelSpecs = $this->componentsResolver->resolve(FuelSpecification::class, $row);
        $transmission = $this->componentsResolver->resolve(Transmission::class, $row);
        $dimensions = $this->componentsResolver->resolve(VehicleDimensions::class, $row);
        $performance = $this->componentsResolver->resolve(PerformanceData::class, $row);
        $electricSpecs = $this->componentsResolver->resolve(ElectricSpecification::class, $row);

        $vehicle = $this->vehicleFactory->createVehicle(
                $row,
                $engine,
                $fuelSpecs,
                $transmission,
                $dimensions,
                $performance,
                $electricSpecs
            );

        unset($engine, $fuelSpecification, $transmission, $dimensions, $performance, $electricSpecs);

        return $vehicle;
    }
}
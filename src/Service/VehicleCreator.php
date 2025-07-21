<?php

namespace App\Service;

use App\Entity\Vehicle;
use App\Factory\ElectricSpecsFactory;
use App\Factory\EngineFactory;
use App\Factory\FuelSpecsFactory;
use App\Factory\PerformanceDataFactory;
use App\Factory\TransmissionFactory;
use App\Factory\VehicleDimensionsFactory;
use App\Factory\VehicleFactory;
use App\Repository\ElectricSpecificationRepository;
use App\Repository\EngineRepository;
use App\Repository\FuelSpecificationRepository;
use App\Repository\PerformanceDataRepository;
use App\Repository\TransmissionRepository;
use App\Repository\VehicleDimensionsRepository;
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

        $engine = $this->componentsResolver->resolve('engine', $row);
        $fuelSpecs = $this->componentsResolver->resolve('fuel_specs', $row);
        $transmission = $this->componentsResolver->resolve('transmission', $row);
        $dimensions = $this->componentsResolver->resolve('vehicle_dimensions', $row);
        $performance = $this->componentsResolver->resolve('performance_data', $row);
        $electricSpecs = $this->componentsResolver->resolve('electric_specs', $row);

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
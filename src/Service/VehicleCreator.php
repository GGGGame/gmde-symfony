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

class VehicleCreator
{
    public function __construct(
        private VehicleFactory $vehicleFactory,
        private EngineFactory $engineFactory,
        private FuelSpecsFactory $fuelSpecificationFactory,
        private TransmissionFactory $transmissionFactory,
        private VehicleDimensionsFactory $vehicleDimensionsFactory,
        private PerformanceDataFactory $performanceDataFactory,
        private ElectricSpecsFactory $electricSpecificationFactory
    ) {}

    public function createCompleteVehicle(array $row): Vehicle
    {
        $engine = $this->engineFactory->createEngine($row);
        $fuelSpecification = $this->fuelSpecificationFactory->createFuelSpecs($row);
        $transmission = $this->transmissionFactory->createTransmission($row);
        $dimensions = $this->vehicleDimensionsFactory->createVehicleDimensions($row);
        $performance = $this->performanceDataFactory->createPerformanceData($row);
        $electricSpecs = $this->electricSpecificationFactory->createElectricSpecs($row);

        return $this->vehicleFactory->createVehicle(
            $row,
            $engine,
            $fuelSpecification,
            $transmission,
            $dimensions,
            $performance,
            $electricSpecs
        );
    }
}
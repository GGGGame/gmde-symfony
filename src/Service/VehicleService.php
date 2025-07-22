<?php

namespace App\Service;

use App\DTO\VehicleDTO;
use App\Entity\Vehicle;
use App\Mapper\VehicleMapper;

class VehicleService
{
    public function __construct(
        private VehicleMapper $vehicleMapper
    )
    {
        
    }

    public function getVehicleDTO(Vehicle $vehicle): VehicleDTO
    {
        if (!$vehicle->getId()) {
            throw new \InvalidArgumentException('Vehicle ID is not valid');
        }

        return $this->vehicleMapper->toDTO($vehicle);
    }
}
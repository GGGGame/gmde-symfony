<?php

namespace App\Factory;

use App\Entity\VehicleDimensions;

class VehicleDimensionsFactory
{
    public function createVehicleDimensions(array $data): VehicleDimensions
    {
        $vehicleDimensions = new VehicleDimensions();

        return $vehicleDimensions
            ->setHatchbackLuggageVolume($data['hatchbackLuggageVolume'] ?? null)
            ->setHatchbackPassengerVolume($data['hatchbackPassengerVolume'] ?? null)
            ->setTwoDoorLuggageVolume($data['2DoorLuggageVolume'] ?? null)
            ->setFourDoorLuggageVolume($data['4DoorLuggageVolume'] ?? null)
            ->setTwoDoorPassengerVolume($data['2DoorPassengerVolume'] ?? null)
            ->setFourDoorPassengerVolume($data['4DoorPassengerVolume'] ?? null);
    }
}
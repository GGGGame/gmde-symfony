<?php

namespace App\Mapper\Components;

use App\DTO\VehicleDimensionsDTO;
use App\Entity\VehicleDimensions;
use App\interface\MapperInterface;

class VehicleDimensionsMapper implements MapperInterface
{
    public function supports(object $entity): bool
    {
        return $entity instanceof VehicleDimensions;
    }

    public function toDTO(object $entity): object
    {
        if (!$entity instanceof VehicleDimensions) {
            throw new \InvalidArgumentException('Expected VehicleDimensions entity');
        }

        return new VehicleDimensionsDTO(
            $entity->getId(),
            $entity->getHatchbackLuggageVolume(),
            $entity->getHatchbackPassengerVolume(),
            $entity->getTwoDoorLuggageVolume(),
            $entity->getFourDoorLuggageVolume(),
            $entity->getTwoDoorPassengerVolume(),
            $entity->getFourDoorPassengerVolume()
        );
    }
}
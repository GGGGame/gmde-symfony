<?php

namespace App\Mapper\Components;

use App\DTO\TransmissionDTO;
use App\Entity\Transmission;
use App\interface\MapperInterface;

class TransmissionMapper implements MapperInterface
{
    public function supports(object $entity): bool
    {
        return $entity instanceof Transmission;
    }

    public function toDTO(object $entity): object
    {
        if (!$entity instanceof Transmission) {
            throw new \InvalidArgumentException('Expected Transmission entity');
        }
        
        return new TransmissionDTO(
            $entity->getId(),
            $entity->getTransmission(),
            $entity->getTransmissionDescriptor(),
            $entity->getTCharger(),
            $entity->getSCharger()
        );
    }
}
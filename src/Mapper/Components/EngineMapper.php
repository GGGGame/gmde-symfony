<?php

namespace App\Mapper\Components;

use App\DTO\EngineDTO;
use App\Entity\Engine;
use App\interface\MapperInterface;

class EngineMapper implements MapperInterface
{
    public function supports(object $entity): bool
    {
        return $entity instanceof Engine;
    }

    public function toDTO(object $entity): object
    {
        if (!$entity instanceof Engine) {
            throw new \InvalidArgumentException('Expected Engine entity');
        }   

        return new EngineDTO(
            $entity->getId(),
            $entity->getCylinders(),
            $entity->getDisplacement(),
            $entity->getDrive(),
            $entity->getEngineDescriptor(),
            $entity->getEpaModelTypeIndex(),
            $entity->getSystemStartStop()
        );
    }
}
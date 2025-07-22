<?php

namespace App\Mapper\Components;

use App\DTO\ElectricSpecsDTO;
use App\Entity\ElectricSpecification;
use App\interface\MapperInterface;

class ElectricSpecsMapper implements MapperInterface
{
    public function supports(object $entity): bool
    {
        return $entity instanceof ElectricSpecification;
    }
    

    public function toDTO(object $entity): object
    {
        if (!$entity instanceof ElectricSpecification) {
            throw new \InvalidArgumentException('Expected ElectricSpecification entity');
        }

        return new ElectricSpecsDTO(
            $entity->getId(),
            $entity->getTimeToCharge120V(),
            $entity->getTimeToCharge240V(),
            $entity->getC240Dscr(),
            $entity->getCharge240b(),
            $entity->getC240BDscr(),
            $entity->getElectricMotor(),
            $entity->getEpaRangeFT2(),
            $entity->getMfrCode(),
            $entity->getPhevCity(),
            $entity->getPhevHighway(),
            $entity->getPhevCombined()
        );

    }
}
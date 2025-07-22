<?php

namespace App\Mapper\Components;

use App\DTO\PerformanceDataDTO;
use App\Entity\PerformanceData;
use App\interface\MapperInterface;

class PerformanceSpecsMapper implements MapperInterface
{
    public function supports(object $entity): bool
    {
        return $entity instanceof PerformanceData;
    }

    public function toDTO(object $entity): object
    {
        if (!$entity instanceof PerformanceData) {
            throw new \InvalidArgumentException('Expected PerformanceData entity');
        }

        return new PerformanceDataDTO(
            $entity->getId(),
            $entity->getRangeFT1(),
            $entity->getRangeCityFT1(),
            $entity->getRangeCityFT2(),
            $entity->getRangeHighwayFT1(),
            $entity->getRangeHighwayFT2(),
            $entity->getUnadjustedCityMpgFT1(),
            $entity->getUnadjustedCityMpgFT2(),
            $entity->getUnadjustedHighwayMpgFT1(),
            $entity->getUnadjustedHighwayMpgFT2(),
            $entity->getMpgData(),
            $entity->isPhevBlended()
        );
    }
}
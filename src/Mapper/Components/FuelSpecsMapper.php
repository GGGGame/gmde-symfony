<?php

namespace App\Mapper\Components;

use App\DTO\FuelSpecsDTO;
use App\Entity\FuelSpecification;
use App\interface\MapperInterface;

class FuelSpecsMapper implements MapperInterface
{
    public function supports(object $entity): bool
    {
        return $entity instanceof FuelSpecification;
    }
    
    public function toDTO(object $entity): object
    {
        if (!$entity instanceof FuelSpecification) {
            throw new \InvalidArgumentException('Expected FuelSpecification entity');
        }

        return new FuelSpecsDTO(
            $entity->getId(),
            $entity->getFuelType(),
            $entity->getFuelType1(),
            $entity->getFuelType2(),
            $entity->getEpaFuelEconomyScore(),
            $entity->getGhgScore(),
            $entity->getGhgScoreAlternativeFuel(),
            $entity->getAnnualPetroleumConsumptionFT1(),
            $entity->getAnnualPetroleumConsumptionFT2(),
            $entity->getAnnualFuelCostFT1(),
            $entity->getAnnualFuelCostFT2(),
            $entity->getCityMpgFT1(),
            $entity->getCityMpgFT2(),
            $entity->getUnroundedCityMpgFT1(),
            $entity->getUnroundedCityMpgFT2(),
            $entity->getCombinedMpgFT1(),
            $entity->getCombinedMpgFT2(),
            $entity->getUnroundedCombinedMpgFT1(),
            $entity->getUnroundedCombinedMpgFT2(),
            $entity->getHighwayMpgFT1(),
            $entity->getHighwayMpgFT2(),
            $entity->getUnroundedHighwayMpgFT1(),
            $entity->getUnroundedHighwayMpgFT2(),
            $entity->getCityGasolineConsumption(),
            $entity->getCityElectricityConsumption(),
            $entity->getCombinedElectricityConsumption(),
            $entity->getCombinedGasolineConsumption(),
            $entity->getHighwayGasolineConsumption(),
            $entity->getHighwayElectricityConsumption(),
            $entity->getCo2FT1(),
            $entity->getCo2FT2(),
            $entity->getCo2TailPipeFT1(),
            $entity->getCo2TailPipeFT2(),
            $entity->getEpaCityUtilityFactor(),
            $entity->getEpaCombinedUtilityFactor(),
            $entity->getEpaHighwayUtilityFactor()
        );
    }
}
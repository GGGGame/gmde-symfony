<?php

namespace App\Factory;

use App\Entity\FuelSpecification;

class FuelSpecsFactory
{
    public function createFuelSpecs(array $data): FuelSpecification
    {
        $fuelSpecification = new FuelSpecification();

        return $fuelSpecification
            ->setFuelType($data['fuelType'] ?? null)
            ->setFuelType1($data['fuelType1'] ?? null)
            ->setFuelType2($data['fuelType2'] ?? null)
            ->setEpaFuelEconomyScore($data['ePAFuelEconomyScore'] ?? null)
            ->setGhgScore($data['gHGScore'] ?? null)
            ->setGhgScoreAlternativeFuel($data['gHGScoreAlternativeFuel'] ?? null)
            ->setAnnualPetroleumConsumptionFT1($data['annualPetroleumConsumptionForFuelType1'] ?? null)
            ->setAnnualPetroleumConsumptionFT2($data['annualPetroleumConsumptionForFuelType2'] ?? null)
            ->setAnnualFuelCostFT1($data['annualFuelCostForFuelType1'] ?? null)
            ->setAnnualFuelCostFT2($data['annualFuelCostForFuelType2'] ?? null)
            ->setCityMpgFT1($data['cityMpgForFuelType1'] ?? null)
            ->setCityMpgFT2($data['cityMpgForFuelType2'] ?? null)
            ->setUnroundedCityMpgFT1($data['unroundedCityMpgForFuelType1'] ?? null)
            ->setUnroundedCityMpgFT2($data['unroundedCityMpgForFuelType2'] ?? null)
            ->setCombinedMpgFT1($data['combinedMpgForFuelType1'] ?? null)
            ->setCombinedMpgFT2($data['combinedMpgForFuelType2'] ?? null)
            ->setUnroundedCombinedMpgFT1($data['unroundedCombinedMpgForFuelType1'] ?? null)
            ->setUnroundedCombinedMpgFT2($data['unroundedCombinedMpgForFuelType2'] ?? null)
            ->setHighwayMpgFT1($data['highwayMpgForFuelType1'] ?? null)
            ->setHighwayMpgFT2($data['highwayMpgForFuelType2'] ?? null)
            ->setUnroundedHighwayMpgFT1($data['unroundedHighwayMpgForFuelType1'] ?? null)
            ->setUnroundedHighwayMpgFT2($data['unroundedHighwayMpgForFuelType2'] ?? null)
            ->setCityGasolineConsumption($data['cityGasolineConsumption'] ?? null)
            ->setCityElectricityConsumption($data['cityElectricityConsumption'] ?? null)
            ->setCombinedElectricityConsumption($data['combinedElectricityConsumption'] ?? null)
            ->setCombinedGasolineConsumption($data['combinedGasolineConsumption'] ?? null)
            ->setHighwayGasolineConsumption($data['highwayGasolineConsumption'] ?? null)
            ->setHighwayElectricityConsumption($data['highwayElectricityConsumption'] ?? null)
            ->setCo2FT1($data['co2ForFuelType1'] ?? null)
            ->setCo2FT2($data['co2ForFuelType2'] ?? null)
            ->setCo2TailpipeFT1($data['co2TailpipeForFuelType1'] ?? null)
            ->setCo2TailpipeFT2($data['co2TailpipeForFuelType2'] ?? null)
            ->setEpaCityUtilityFactor($data['ePACityUtilityFactor'] ?? null)
            ->setEpaHighwayUtilityFactor($data['ePAHighwayUtilityFactor'] ?? null)
            ->setEpaCombinedUtilityFactor($data['ePACombinedUtilityFactor'] ?? null);
    }
}
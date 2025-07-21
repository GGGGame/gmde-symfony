<?php

class FuelSpecsDTO
{
    public function __construct(
        public ?int $id,
        public ?string $fuelType,
        public ?string $fuelType1,
        public ?string $fuelType2,
        public ?int $epaFuelEconomyScore,
        public ?int $ghgScore,
        public ?int $ghgScoreAlternativeFuel,
        public ?string $annualPetroleumConsumptionFT1,
        public ?string $annualPetroleumConsumptionFT2,
        public ?int $annualFuelCostFT1,
        public ?int $annualFuelCostFT2,
        public ?int $cityMpgFT1,
        public ?int $cityMpgFT2,
        public ?string $unroundedCityMpgFT1,
        public ?string $unroundedCityMpgFT2,
        public ?int $combinedMpgFT1,
        public ?int $combinedMpgFT2,
        public ?string $unroundedCombinedMpgFT1,
        public ?string $unroundedCombinedMpgFT2,
        public ?int $highwayMpgFT1,
        public ?int $highwayMpgFT2,
        public ?string $unroundedHighwayMpgFT1,
        public ?string $unroundedHighwayMpgFT2,
        public ?string $cityGasolineConsumption,
        public ?string $cityElectricityConsumption,
        public ?string $combinedEletricityConsumption,
        public ?string $combinedGasolineConsumption,
        public ?string $highwayGasolineConsumption,
        public ?string $highwayElectricityConsumption,
        public ?string $co2FT1,
        public ?string $co2FT2,
        public ?string $co2TailPipeFT1,
        public ?string $co2TailPipeFT2,
        public ?string $epaCityUtilityFactor,
        public ?string $epaCombinedUtilityFactor,
        public ?string $epaHighwayUtilityFactor
    )
    {
        
    }
}
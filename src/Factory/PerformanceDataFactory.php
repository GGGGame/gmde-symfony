<?php

namespace App\Factory;

use App\Entity\PerformanceData;

class PerformanceDataFactory
{
    public function createPerformanceData(array $data): PerformanceData
    {
        $performanceData = new PerformanceData();

        $performanceData
            ->setRangeFT1($data['rangeForFuelType1'] ?? null)
            ->setRangeCityFT1($data['rangeCityForFuelType1'] ?? null)
            ->setRangeCityFT2($data['rangeCityForFuelType2'] ?? null)
            ->setRangeHighwayFT1($data['rangeHighwayForFuelType1'] ?? null)
            ->setRangeHighwayFT2($data['rangeHighwayForFuelType2'] ?? null)
            ->setUnadjustedCityMpgFT1($data['unadjustedCityMpgForFuelType1'] ?? null)
            ->setUnadjustedCityMpgFT2($data['unadjustedCityMpgForFuelType2'] ?? null)
            ->setUnadjustedHighwayMpgFT1($data['unadjustedHighwayMpgForFuelType1'] ?? null)
            ->setUnadjustedHighwayMpgFT2($data['unadjustedHighwayMpgForFuelType2'] ?? null)
            ->setMpgData($data['mpgData'] ?? null)
            ->setPhevBlended($data['pHEVBlended'] ?? null);

        return $performanceData;
    }
}
<?php

namespace App\DTO;

class PerformanceDataDTO
{
    public function __construct(
        public ?int $id,
        public ?int $rangeFT1,
        public ?int $rangeCityFT1,
        public ?int $rangeCityFT2,
        public ?int $rangeHighwayFT1,
        public ?int $rangeHighwayFT2,
        public ?int $unadjustedCityMpgFT1,
        public ?int $unadjustedCityMpgFT2,
        public ?int $unadjustedHighwayMpgFT1,
        public ?int $unadjustedHighwayMpgFT2,
        public ?int $mpgData,
        public ?bool $phevBlended
    )
    {
        
    }
}
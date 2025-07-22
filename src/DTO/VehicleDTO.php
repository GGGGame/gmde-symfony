<?php

namespace App\DTO;
class VehicleDTO
{
    public function __construct(
        public ?int $id,
        public ?string $brand,
        public ?string $model,
        public ?int $year,
        public ?string $baseModel,
        public ?string $vehicleSizeClass,
        public ?string $atvType,
        public ?string $guzzler,
        public ?int $vehicleSaveSpend,
        public ?\DateTime $createdOn,
        public ?\DateTime $modifiedOn,
        public ?EngineDTO $engineDTO,
        public ?FuelSpecsDTO $fuelSpecsDTO,
        public ?TransmissionDTO $transmissionDTO,
        public ?VehicleDimensionsDTO $vehicleDimensionsDTO,
        public ?PerformanceDataDTO $performanceDataDTO,
        public ?ElectricSpecsDTO $electricSpecsDTO
    )
    {
        
    }
}
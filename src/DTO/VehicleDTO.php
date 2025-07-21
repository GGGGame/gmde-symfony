<?php

namespace App\DTO;

use App\Entity\ElectricSpecification;
use App\Entity\Engine;
use App\Entity\FuelSpecification;
use App\Entity\PerformanceData;
use App\Entity\Transmission;
use App\Entity\VehicleDimensions;

class VehicleDTO
{
    public function __construct(
        public ?int $id,
        public ?string $brand,
        public ?int $year,
        public ?string $baseModel,
        public ?string $vehicleSizeClass,
        public ?string $atvType,
        public ?string $guzzler,
        public ?int $vehicleSaveSpend,
        public ?\DateTime $createdOn,
        public ?\DateTime $modifiedOn,
        public ?Engine $engineSpecs,
        public ?FuelSpecification $fuelSpecs,
        public ?Transmission $transmissionSpecs,
        public ?VehicleDimensions $dimensionSpecs,
        public ?PerformanceData $performanceSpecs,
        public ?ElectricSpecification $eletricSpecs
    )
    {
        
    }
}
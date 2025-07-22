<?php

namespace App\Mapper;

use App\DTO\VehicleDTO;
use App\Entity\Vehicle;

class VehicleMapper
{
    public function __construct(
        private MapperRegistry $mapperRegistry
    )
    {
        
    }
    
    public function toDTO(object $entity): VehicleDTO
    {

        if (!$entity instanceof Vehicle) {
            throw new \InvalidArgumentException('Expected Vehicle entity');
        }

        $engineDTO = $this->mapperRegistry->map($entity->getEngineSpecs());
        $transmissionDTO = $this->mapperRegistry->map($entity->getTransmissionSpecs());
        $fuelSpecsDTO = $this->mapperRegistry->map($entity->getFuelSpecs());
        $vehicleDimensionsDTO = $this->mapperRegistry->map($entity->getDimensionSpecs());
        $electricSpecsDTO = $this->mapperRegistry->map($entity->getElectricSpecs());
        $performanceSpecsDTO = $this->mapperRegistry->map($entity->getPerformanceSpecs());

        return new VehicleDTO(
            $entity->getId(),
            $entity->getBrand(),
            $entity->getModel(),
            $entity->getYear(),
            $entity->getBaseModel(),
            $entity->getVehicleSizeClass(),
            $entity->getAtvType(),
            $entity->getGuzzler(),
            $entity->getVehicleSaveSpend(),
            $entity->getCreatedOn(),
            $entity->getModifiedOn(),
            $engineDTO,
            $fuelSpecsDTO,
            $transmissionDTO,
            $vehicleDimensionsDTO,
            $performanceSpecsDTO,
            $electricSpecsDTO
        );
        
    }
}
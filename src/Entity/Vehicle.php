<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $baseModel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vehicleSizeClass = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $atvType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $guzzler = null;

    #[ORM\Column(nullable: true)]
    private ?int $vehicleSaveSpend = null;

    #[ORM\Column(nullable: true)]
    private ?int $vehicleId = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $createdOn = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $modifiedOn = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    private ?Engine $engineSpecs = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    private ?FuelSpecification $fuelSpecs = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    private ?Transmission $transmissionSpecs = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    private ?VehicleDimensions $dimensionSpecs = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    private ?PerformanceData $performanceSpecs = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    private ?ElectricSpecification $electricSpecs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getBaseModel(): ?string
    {
        return $this->baseModel;
    }

    public function setBaseModel(?string $baseModel): static
    {
        $this->baseModel = $baseModel;

        return $this;
    }

    public function getVehicleSizeClass(): ?string
    {
        return $this->vehicleSizeClass;
    }

    public function setVehicleSizeClass(?string $vehicleSizeClass): static
    {
        $this->vehicleSizeClass = $vehicleSizeClass;

        return $this;
    }

    public function getAtvType(): ?string
    {
        return $this->atvType;
    }

    public function setAtvType(?string $atvType): static
    {
        $this->atvType = $atvType;

        return $this;
    }

    public function getGuzzler(): ?string
    {
        return $this->guzzler;
    }

    public function setGuzzler(?string $guzzler): static
    {
        $this->guzzler = $guzzler;

        return $this;
    }

    public function getVehicleSaveSpend(): ?int
    {
        return $this->vehicleSaveSpend;
    }

    public function setVehicleSaveSpend(?int $vehicleSaveSpend): static
    {
        $this->vehicleSaveSpend = $vehicleSaveSpend;

        return $this;
    }

    public function getVehicleId(): ?int
    {
        return $this->vehicleId;
    }

    public function setVehicleId(?int $vehicleId): static
    {
        $this->vehicleId = $vehicleId;

        return $this;
    }

    public function getCreatedOn(): ?\DateTime
    {
        return $this->createdOn;
    }

    public function setCreatedOn(?\DateTime $createdOn): static
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getModifiedOn(): ?\DateTime
    {
        return $this->modifiedOn;
    }

    public function setModifiedOn(?\DateTime $modifiedOn): static
    {
        $this->modifiedOn = $modifiedOn;

        return $this;
    }

    public function getEngineSpecs(): ?Engine
    {
        return $this->engineSpecs;
    }

    public function setEngineSpecs(?Engine $engineSpecs): static
    {
        $this->engineSpecs = $engineSpecs;

        return $this;
    }

    public function getFuelSpecs(): ?FuelSpecification
    {
        return $this->fuelSpecs;
    }

    public function setFuelSpecs(?FuelSpecification $fuelSpecs): static
    {
        $this->fuelSpecs = $fuelSpecs;

        return $this;
    }

    public function getTransmissionSpecs(): ?Transmission
    {
        return $this->transmissionSpecs;
    }

    public function setTransmissionSpecs(?Transmission $transmissionSpecs): static
    {
        $this->transmissionSpecs = $transmissionSpecs;

        return $this;
    }

    public function getDimensionSpecs(): ?VehicleDimensions
    {
        return $this->dimensionSpecs;
    }

    public function setDimensionSpecs(?VehicleDimensions $dimensionSpecs): static
    {
        $this->dimensionSpecs = $dimensionSpecs;

        return $this;
    }

    public function getPerformanceSpecs(): ?PerformanceData
    {
        return $this->performanceSpecs;
    }

    public function setPerformanceSpecs(?PerformanceData $performanceSpecs): static
    {
        $this->performanceSpecs = $performanceSpecs;

        return $this;
    }

    public function getElectricSpecs(): ?ElectricSpecification
    {
        return $this->electricSpecs;
    }

    public function setElectricSpecs(?ElectricSpecification $electricSpecs): static
    {
        $this->electricSpecs = $electricSpecs;

        return $this;
    }
}

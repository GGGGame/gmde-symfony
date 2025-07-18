<?php

namespace App\Entity;

use App\Repository\FuelSpecificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FuelSpecificationRepository::class)]
class FuelSpecification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fuelType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fuelType1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fuelType2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $epaFuelEconomyScore = null;

    #[ORM\Column(nullable: true)]
    private ?int $ghgScore = null;

    #[ORM\Column(nullable: true)]
    private ?int $ghgScoreAlternativeFuel = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $annualPetroleumConsumptionFT1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $annualPetroleumConsumptionFT2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $annualFuelCostFT1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $annualFuelCostFT2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $cityMpgFT1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $cityMpgFT2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $unroundedCityMpgFT1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $unroundedCityMpgFT2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $combinedMpgFT1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $combinedMpgFT2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $unroundedCombinedMpgFT1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $unroundedCombinedMpgFT2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $highwayMpgFT1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $unroundedHighwayMpgFT1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $unroundedHighwayMpgFT2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $cityGasolineConsumption = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $cityElectricityConsumption = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $combinedElectricityConsumption = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $combinedGasolineConsumption = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $highwayGasolineConsumption = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $highwayElectricityConsumption = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $co2FT1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $co2FT2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $co2TailpipeFT1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $co2TailPipeFT2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $epaCityUtilityFactor = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $epaCombinedUtilityFactor = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 10, nullable: true)]
    private ?string $epaHighwayUtilityFactor = null;

    /**
     * @var Collection<int, Vehicle>
     */
    #[ORM\OneToMany(targetEntity: Vehicle::class, mappedBy: 'fuelSpecs')]
    private Collection $vehicles;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFuelType(): ?string
    {
        return $this->fuelType;
    }

    public function setFuelType(?string $fuelType): static
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    public function getFuelType1(): ?string
    {
        return $this->fuelType1;
    }

    public function setFuelType1(?string $fuelType1): static
    {
        $this->fuelType1 = $fuelType1;

        return $this;
    }

    public function getFuelType2(): ?string
    {
        return $this->fuelType2;
    }

    public function setFuelType2(?string $fuelType2): static
    {
        $this->fuelType2 = $fuelType2;

        return $this;
    }

    public function getEpaFuelEconomyScore(): ?int
    {
        return $this->epaFuelEconomyScore;
    }

    public function setEpaFuelEconomyScore(?int $epaFuelEconomyScore): static
    {
        $this->epaFuelEconomyScore = $epaFuelEconomyScore;

        return $this;
    }

    public function getGhgScore(): ?int
    {
        return $this->ghgScore;
    }

    public function setGhgScore(?int $ghgScore): static
    {
        $this->ghgScore = $ghgScore;

        return $this;
    }

    public function getGhgScoreAlternativeFuel(): ?int
    {
        return $this->ghgScoreAlternativeFuel;
    }

    public function setGhgScoreAlternativeFuel(?int $ghgScoreAlternativeFuel): static
    {
        $this->ghgScoreAlternativeFuel = $ghgScoreAlternativeFuel;

        return $this;
    }

    public function getAnnualPetroleumConsumptionFT1(): ?string
    {
        return $this->annualPetroleumConsumptionFT1;
    }

    public function setAnnualPetroleumConsumptionFT1(?string $annualPetroleumConsumptionFT1): static
    {
        $this->annualPetroleumConsumptionFT1 = $annualPetroleumConsumptionFT1;

        return $this;
    }

    public function getAnnualPetroleumConsumptionFT2(): ?string
    {
        return $this->annualPetroleumConsumptionFT2;
    }

    public function setAnnualPetroleumConsumptionFT2(?string $annualPetroleumConsumptionFT2): static
    {
        $this->annualPetroleumConsumptionFT2 = $annualPetroleumConsumptionFT2;

        return $this;
    }

    public function getAnnualFuelCostFT1(): ?int
    {
        return $this->annualFuelCostFT1;
    }

    public function setAnnualFuelCostFT1(?int $annualFuelCostFT1): static
    {
        $this->annualFuelCostFT1 = $annualFuelCostFT1;

        return $this;
    }

    public function getAnnualFuelCostFT2(): ?int
    {
        return $this->annualFuelCostFT2;
    }

    public function setAnnualFuelCostFT2(?int $annualFuelCostFT2): static
    {
        $this->annualFuelCostFT2 = $annualFuelCostFT2;

        return $this;
    }

    public function getCityMpgFT1(): ?int
    {
        return $this->cityMpgFT1;
    }

    public function setCityMpgFT1(?int $cityMpgFT1): static
    {
        $this->cityMpgFT1 = $cityMpgFT1;

        return $this;
    }

    public function getCityMpgFT2(): ?int
    {
        return $this->cityMpgFT2;
    }

    public function setCityMpgFT2(?int $cityMpgFT2): static
    {
        $this->cityMpgFT2 = $cityMpgFT2;

        return $this;
    }

    public function getUnroundedCityMpgFT1(): ?string
    {
        return $this->unroundedCityMpgFT1;
    }

    public function setUnroundedCityMpgFT1(?string $unroundedCityMpgFT1): static
    {
        $this->unroundedCityMpgFT1 = $unroundedCityMpgFT1;

        return $this;
    }

    public function getUnroundedCityMpgFT2(): ?string
    {
        return $this->unroundedCityMpgFT2;
    }

    public function setUnroundedCityMpgFT2(?string $unroundedCityMpgFT2): static
    {
        $this->unroundedCityMpgFT2 = $unroundedCityMpgFT2;

        return $this;
    }

    public function getCombinedMpgFT1(): ?int
    {
        return $this->combinedMpgFT1;
    }

    public function setCombinedMpgFT1(?int $combinedMpgFT1): static
    {
        $this->combinedMpgFT1 = $combinedMpgFT1;

        return $this;
    }

    public function getCombinedMpgFT2(): ?int
    {
        return $this->combinedMpgFT2;
    }

    public function setCombinedMpgFT2(?int $combinedMpgFT2): static
    {
        $this->combinedMpgFT2 = $combinedMpgFT2;

        return $this;
    }

    public function getUnroundedCombinedMpgFT1(): ?string
    {
        return $this->unroundedCombinedMpgFT1;
    }

    public function setUnroundedCombinedMpgFT1(?string $unroundedCombinedMpgFT1): static
    {
        $this->unroundedCombinedMpgFT1 = $unroundedCombinedMpgFT1;

        return $this;
    }

    public function getUnroundedCombinedMpgFT2(): ?string
    {
        return $this->unroundedCombinedMpgFT2;
    }

    public function setUnroundedCombinedMpgFT2(?string $unroundedCombinedMpgFT2): static
    {
        $this->unroundedCombinedMpgFT2 = $unroundedCombinedMpgFT2;

        return $this;
    }

    public function getHighwayMpgFT1(): ?int
    {
        return $this->highwayMpgFT1;
    }

    public function setHighwayMpgFT1(?int $highwayMpgFT1): static
    {
        $this->highwayMpgFT1 = $highwayMpgFT1;

        return $this;
    }

    public function getUnroundedHighwayMpgFT1(): ?string
    {
        return $this->unroundedHighwayMpgFT1;
    }

    public function setUnroundedHighwayMpgFT1(?string $unroundedHighwayMpgFT1): static
    {
        $this->unroundedHighwayMpgFT1 = $unroundedHighwayMpgFT1;

        return $this;
    }

    public function getUnroundedHighwayMpgFT2(): ?string
    {
        return $this->unroundedHighwayMpgFT2;
    }

    public function setUnroundedHighwayMpgFT2(?string $unroundedHighwayMpgFT2): static
    {
        $this->unroundedHighwayMpgFT2 = $unroundedHighwayMpgFT2;

        return $this;
    }

    public function getCityGasolineConsumption(): ?string
    {
        return $this->cityGasolineConsumption;
    }

    public function setCityGasolineConsumption(?string $cityGasolineConsumption): static
    {
        $this->cityGasolineConsumption = $cityGasolineConsumption;

        return $this;
    }

    public function getCityElectricityConsumption(): ?string
    {
        return $this->cityElectricityConsumption;
    }

    public function setCityElectricityConsumption(?string $cityElectricityConsumption): static
    {
        $this->cityElectricityConsumption = $cityElectricityConsumption;

        return $this;
    }

    public function getCombinedElectricityConsumption(): ?string
    {
        return $this->combinedElectricityConsumption;
    }

    public function setCombinedElectricityConsumption(?string $combinedElectricityConsumption): static
    {
        $this->combinedElectricityConsumption = $combinedElectricityConsumption;

        return $this;
    }

    public function getCombinedGasolineConsumption(): ?string
    {
        return $this->combinedGasolineConsumption;
    }

    public function setCombinedGasolineConsumption(?string $combinedGasolineConsumption): static
    {
        $this->combinedGasolineConsumption = $combinedGasolineConsumption;

        return $this;
    }

    public function getHighwayGasolineConsumption(): ?string
    {
        return $this->highwayGasolineConsumption;
    }

    public function setHighwayGasolineConsumption(?string $highwayGasolineConsumption): static
    {
        $this->highwayGasolineConsumption = $highwayGasolineConsumption;

        return $this;
    }

    public function getHighwayElectricityConsumption(): ?string
    {
        return $this->highwayElectricityConsumption;
    }

    public function setHighwayElectricityConsumption(?string $highwayElectricityConsumption): static
    {
        $this->highwayElectricityConsumption = $highwayElectricityConsumption;

        return $this;
    }

    public function getCo2FT1(): ?string
    {
        return $this->co2FT1;
    }

    public function setCo2FT1(?string $co2FT1): static
    {
        $this->co2FT1 = $co2FT1;

        return $this;
    }

    public function getCo2FT2(): ?string
    {
        return $this->co2FT2;
    }

    public function setCo2FT2(?string $co2FT2): static
    {
        $this->co2FT2 = $co2FT2;

        return $this;
    }

    public function getCo2TailpipeFT1(): ?string
    {
        return $this->co2TailpipeFT1;
    }

    public function setCo2TailpipeFT1(string $co2TailpipeFT1): static
    {
        $this->co2TailpipeFT1 = $co2TailpipeFT1;

        return $this;
    }

    public function getCo2TailPipeFT2(): ?string
    {
        return $this->co2TailPipeFT2;
    }

    public function setCo2TailPipeFT2(?string $co2TailPipeFT2): static
    {
        $this->co2TailPipeFT2 = $co2TailPipeFT2;

        return $this;
    }

    public function getEpaCityUtilityFactor(): ?string
    {
        return $this->epaCityUtilityFactor;
    }

    public function setEpaCityUtilityFactor(?string $epaCityUtilityFactor): static
    {
        $this->epaCityUtilityFactor = $epaCityUtilityFactor;

        return $this;
    }

    public function getEpaCombinedUtilityFactor(): ?string
    {
        return $this->epaCombinedUtilityFactor;
    }

    public function setEpaCombinedUtilityFactor(?string $epaCombinedUtilityFactor): static
    {
        $this->epaCombinedUtilityFactor = $epaCombinedUtilityFactor;

        return $this;
    }

    public function getEpaHighwayUtilityFactor(): ?string
    {
        return $this->epaHighwayUtilityFactor;
    }

    public function setEpaHighwayUtilityFactor(?string $epaHighwayUtilityFactor): static
    {
        $this->epaHighwayUtilityFactor = $epaHighwayUtilityFactor;

        return $this;
    }

    /**
     * @return Collection<int, Vehicle>
     */
    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): static
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles->add($vehicle);
            $vehicle->setFuelSpecs($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): static
    {
        if ($this->vehicles->removeElement($vehicle)) {
            // set the owning side to null (unless already changed)
            if ($vehicle->getFuelSpecs() === $this) {
                $vehicle->setFuelSpecs(null);
            }
        }

        return $this;
    }
}

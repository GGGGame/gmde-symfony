<?php

namespace App\Entity;

use App\Repository\PerformanceDataRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PerformanceDataRepository::class)]
class PerformanceData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $rangeFT1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $rangeCityFT1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $rangeCityFT2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $rangeHighwayFT1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $rangeHighwayFT2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 4, nullable: true)]
    private ?string $unadjustedCityMpgFT1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 4, nullable: true)]
    private ?string $unadjustedCityMpgFT2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 4, nullable: true)]
    private ?string $unadjustedHighwayFT1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 4, nullable: true)]
    private ?string $unadjustedHighwayMpgFT2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mpgData = null;

    #[ORM\Column(nullable: true)]
    private ?bool $phevBlended = null;

    /**
     * @var Collection<int, Vehicle>
     */
    #[ORM\OneToMany(targetEntity: Vehicle::class, mappedBy: 'performanceSpecs')]
    private Collection $vehicles;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRangeFT1(): ?int
    {
        return $this->rangeFT1;
    }

    public function setRangeFT1(?int $rangeFT1): static
    {
        $this->rangeFT1 = $rangeFT1;

        return $this;
    }

    public function getRangeCityFT1(): ?int
    {
        return $this->rangeCityFT1;
    }

    public function setRangeCityFT1(?int $rangeCityFT1): static
    {
        $this->rangeCityFT1 = $rangeCityFT1;

        return $this;
    }

    public function getRangeCityFT2(): ?int
    {
        return $this->rangeCityFT2;
    }

    public function setRangeCityFT2(?int $rangeCityFT2): static
    {
        $this->rangeCityFT2 = $rangeCityFT2;

        return $this;
    }

    public function getRangeHighwayFT1(): ?int
    {
        return $this->rangeHighwayFT1;
    }

    public function setRangeHighwayFT1(?int $rangeHighwayFT1): static
    {
        $this->rangeHighwayFT1 = $rangeHighwayFT1;

        return $this;
    }

    public function getRangeHighwayFT2(): ?int
    {
        return $this->rangeHighwayFT2;
    }

    public function setRangeHighwayFT2(?int $rangeHighwayFT2): static
    {
        $this->rangeHighwayFT2 = $rangeHighwayFT2;

        return $this;
    }

    public function getUnadjustedCityMpgFT1(): ?string
    {
        return $this->unadjustedCityMpgFT1;
    }

    public function setUnadjustedCityMpgFT1(?string $unadjustedCityMpgFT1): static
    {
        $this->unadjustedCityMpgFT1 = $unadjustedCityMpgFT1;

        return $this;
    }

    public function getUnadjustedCityMpgFT2(): ?string
    {
        return $this->unadjustedCityMpgFT2;
    }

    public function setUnadjustedCityMpgFT2(?string $unadjustedCityMpgFT2): static
    {
        $this->unadjustedCityMpgFT2 = $unadjustedCityMpgFT2;

        return $this;
    }

    public function getUnadjustedHighwayFT1(): ?string
    {
        return $this->unadjustedHighwayFT1;
    }

    public function setUnadjustedHighwayFT1(?string $unadjustedHighwayFT1): static
    {
        $this->unadjustedHighwayFT1 = $unadjustedHighwayFT1;

        return $this;
    }

    public function getUnadjustedHighwayMpgFT2(): ?string
    {
        return $this->unadjustedHighwayMpgFT2;
    }

    public function setUnadjustedHighwayMpgFT2(?string $unadjustedHighwayMpgFT2): static
    {
        $this->unadjustedHighwayMpgFT2 = $unadjustedHighwayMpgFT2;

        return $this;
    }

    public function getMpgData(): ?string
    {
        return $this->mpgData;
    }

    public function setMpgData(?string $mpgData): static
    {
        $this->mpgData = $mpgData;

        return $this;
    }

    public function isPhevBlended(): ?bool
    {
        return $this->phevBlended;
    }

    public function setPhevBlended(?bool $phevBlended): static
    {
        $this->phevBlended = $phevBlended;

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
            $vehicle->setPerformanceSpecs($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): static
    {
        if ($this->vehicles->removeElement($vehicle)) {
            // set the owning side to null (unless already changed)
            if ($vehicle->getPerformanceSpecs() === $this) {
                $vehicle->setPerformanceSpecs(null);
            }
        }

        return $this;
    }
}

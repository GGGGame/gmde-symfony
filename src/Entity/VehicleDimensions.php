<?php

namespace App\Entity;

use App\Interface\ImportableEntityInterface;
use App\Repository\VehicleDimensionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleDimensionsRepository::class)]
class VehicleDimensions implements ImportableEntityInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $hatchbackLuggageVolume = null;

    #[ORM\Column(nullable: true)]
    private ?int $hatchbackPassengerVolume = null;

    #[ORM\Column(nullable: true)]
    private ?int $twoDoorLuggageVolume = null;

    #[ORM\Column(nullable: true)]
    private ?int $fourDoorLuggageVolume = null;

    #[ORM\Column(nullable: true)]
    private ?int $twoDoorPassengerVolume = null;

    #[ORM\Column(nullable: true)]
    private ?int $fourDoorPassengerVolume = null;

    /**
     * @var Collection<int, Vehicle>
     */
    #[ORM\OneToMany(targetEntity: Vehicle::class, mappedBy: 'dimensionSpecs')]
    private Collection $vehicles;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHatchbackLuggageVolume(): ?int
    {
        return $this->hatchbackLuggageVolume;
    }

    public function setHatchbackLuggageVolume(?int $hatchbackLuggageVolume): static
    {
        $this->hatchbackLuggageVolume = $hatchbackLuggageVolume;

        return $this;
    }

    public function getHatchbackPassengerVolume(): ?int
    {
        return $this->hatchbackPassengerVolume;
    }

    public function setHatchbackPassengerVolume(?int $hatchbackPassengerVolume): static
    {
        $this->hatchbackPassengerVolume = $hatchbackPassengerVolume;

        return $this;
    }

    public function getTwoDoorLuggageVolume(): ?int
    {
        return $this->twoDoorLuggageVolume;
    }

    public function setTwoDoorLuggageVolume(?int $twoDoorLuggageVolume): static
    {
        $this->twoDoorLuggageVolume = $twoDoorLuggageVolume;

        return $this;
    }

    public function getFourDoorLuggageVolume(): ?int
    {
        return $this->fourDoorLuggageVolume;
    }

    public function setFourDoorLuggageVolume(?int $fourDoorLuggageVolume): static
    {
        $this->fourDoorLuggageVolume = $fourDoorLuggageVolume;

        return $this;
    }

    public function getTwoDoorPassengerVolume(): ?int
    {
        return $this->twoDoorPassengerVolume;
    }

    public function setTwoDoorPassengerVolume(?int $twoDoorPassengerVolume): static
    {
        $this->twoDoorPassengerVolume = $twoDoorPassengerVolume;

        return $this;
    }

    public function getFourDoorPassengerVolume(): ?int
    {
        return $this->fourDoorPassengerVolume;
    }

    public function setFourDoorPassengerVolume(?int $fourDoorPassengerVolume): static
    {
        $this->fourDoorPassengerVolume = $fourDoorPassengerVolume;

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
            $vehicle->setDimensionSpecs($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): static
    {
        if ($this->vehicles->removeElement($vehicle)) {
            // set the owning side to null (unless already changed)
            if ($vehicle->getDimensionSpecs() === $this) {
                $vehicle->setDimensionSpecs(null);
            }
        }

        return $this;
    }
}

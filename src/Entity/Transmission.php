<?php

namespace App\Entity;

use App\Repository\TransmissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransmissionRepository::class)]
class Transmission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $transmission = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $transmissionDescriptor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tCharger = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sCharger = null;

    /**
     * @var Collection<int, Vehicle>
     */
    #[ORM\OneToMany(targetEntity: Vehicle::class, mappedBy: 'transmissionSpecs')]
    private Collection $vehicles;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    public function setTransmission(?string $transmission): static
    {
        $this->transmission = $transmission;

        return $this;
    }

    public function getTransmissionDescriptor(): ?string
    {
        return $this->transmissionDescriptor;
    }

    public function setTransmissionDescriptor(?string $transmissionDescriptor): static
    {
        $this->transmissionDescriptor = $transmissionDescriptor;

        return $this;
    }

    public function getTCharger(): ?string
    {
        return $this->tCharger;
    }

    public function setTCharger(?string $tCharger): static
    {
        $this->tCharger = $tCharger;

        return $this;
    }

    public function getSCharger(): ?string
    {
        return $this->sCharger;
    }

    public function setSCharger(?string $sCharger): static
    {
        $this->sCharger = $sCharger;

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
            $vehicle->setTransmissionSpecs($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): static
    {
        if ($this->vehicles->removeElement($vehicle)) {
            // set the owning side to null (unless already changed)
            if ($vehicle->getTransmissionSpecs() === $this) {
                $vehicle->setTransmissionSpecs(null);
            }
        }

        return $this;
    }
}

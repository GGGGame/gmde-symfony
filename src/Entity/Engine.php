<?php

namespace App\Entity;

use App\Interface\ImportableEntityInterface;
use App\Repository\EngineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EngineRepository::class)]
class Engine implements ImportableEntityInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $cylinders = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $displacement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $drive = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $engineDescriptor = null;

    #[ORM\Column(nullable: true)]
    private ?int $epaModelTypeIndex = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $systemStartStop = null;

    /**
     * @var Collection<int, Vehicle>
     */
    #[ORM\OneToMany(targetEntity: Vehicle::class, mappedBy: 'engineSpecs')]
    private Collection $vehicles;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCylinders(): ?int
    {
        return $this->cylinders;
    }

    public function setCylinders(?int $cylinders): static
    {
        $this->cylinders = $cylinders;

        return $this;
    }

    public function getDisplacement(): ?string
    {
        return $this->displacement;
    }

    public function setDisplacement(?string $displacement): static
    {
        $this->displacement = $displacement;

        return $this;
    }

    public function getDrive(): ?string
    {
        return $this->drive;
    }

    public function setDrive(?string $drive): static
    {
        $this->drive = $drive;

        return $this;
    }

    public function getEngineDescriptor(): ?string
    {
        return $this->engineDescriptor;
    }

    public function setEngineDescriptor(?string $engineDescriptor): static
    {
        $this->engineDescriptor = $engineDescriptor;

        return $this;
    }

    public function getEpaModelTypeIndex(): ?int
    {
        return $this->epaModelTypeIndex;
    }

    public function setEpaModelTypeIndex(?int $epaModelTypeIndex): static
    {
        $this->epaModelTypeIndex = $epaModelTypeIndex;

        return $this;
    }

    public function getSystemStartStop(): ?string
    {
        return $this->systemStartStop;
    }

    public function setSystemStartStop(?string $systemStartStop): static
    {
        $this->systemStartStop = $systemStartStop;

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
            $vehicle->setEngineSpecs($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): static
    {
        if ($this->vehicles->removeElement($vehicle)) {
            // set the owning side to null (unless already changed)
            if ($vehicle->getEngineSpecs() === $this) {
                $vehicle->setEngineSpecs(null);
            }
        }

        return $this;
    }
}

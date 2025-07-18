<?php

namespace App\Entity;

use App\Repository\ElectricSpecificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ElectricSpecificationRepository::class)]
class ElectricSpecification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $timeToCharge120V = null;

    #[ORM\Column(nullable: true)]
    private ?int $timeToCharge240V = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $c240Dscr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $charge240b = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $c240BDscr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $electricMotor = null;

    #[ORM\Column(nullable: true)]
    private ?int $epaRangeFT2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mfrCode = null;

    #[ORM\Column(nullable: true)]
    private ?int $phevCity = null;

    #[ORM\Column(nullable: true)]
    private ?int $phevHighway = null;

    #[ORM\Column(nullable: true)]
    private ?int $phevCombined = null;

    /**
     * @var Collection<int, Vehicle>
     */
    #[ORM\OneToMany(targetEntity: Vehicle::class, mappedBy: 'electricSpecs')]
    private Collection $vehicles;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTimeToCharge120V(): ?int
    {
        return $this->timeToCharge120V;
    }

    public function setTimeToCharge120V(?int $timeToCharge120V): static
    {
        $this->timeToCharge120V = $timeToCharge120V;

        return $this;
    }

    public function getTimeToCharge240V(): ?int
    {
        return $this->timeToCharge240V;
    }

    public function setTimeToCharge240V(?int $timeToCharge240V): static
    {
        $this->timeToCharge240V = $timeToCharge240V;

        return $this;
    }

    public function getC240Dscr(): ?string
    {
        return $this->c240Dscr;
    }

    public function setC240Dscr(?string $c240Dscr): static
    {
        $this->c240Dscr = $c240Dscr;

        return $this;
    }

    public function getCharge240b(): ?string
    {
        return $this->charge240b;
    }

    public function setCharge240b(?string $charge240b): static
    {
        $this->charge240b = $charge240b;

        return $this;
    }

    public function getC240BDscr(): ?string
    {
        return $this->c240BDscr;
    }

    public function setC240BDscr(?string $c240BDscr): static
    {
        $this->c240BDscr = $c240BDscr;

        return $this;
    }

    public function getElectricMotor(): ?string
    {
        return $this->electricMotor;
    }

    public function setElectricMotor(?string $electricMotor): static
    {
        $this->electricMotor = $electricMotor;

        return $this;
    }

    public function getEpaRangeFT2(): ?int
    {
        return $this->epaRangeFT2;
    }

    public function setEpaRangeFT2(?int $epaRangeFT2): static
    {
        $this->epaRangeFT2 = $epaRangeFT2;

        return $this;
    }

    public function getMfrCode(): ?string
    {
        return $this->mfrCode;
    }

    public function setMfrCode(?string $mfrCode): static
    {
        $this->mfrCode = $mfrCode;

        return $this;
    }

    public function getPhevCity(): ?int
    {
        return $this->phevCity;
    }

    public function setPhevCity(?int $phevCity): static
    {
        $this->phevCity = $phevCity;

        return $this;
    }

    public function getPhevHighway(): ?int
    {
        return $this->phevHighway;
    }

    public function setPhevHighway(?int $phevHighway): static
    {
        $this->phevHighway = $phevHighway;

        return $this;
    }

    public function getPhevCombined(): ?int
    {
        return $this->phevCombined;
    }

    public function setPhevCombined(?int $phevCombined): static
    {
        $this->phevCombined = $phevCombined;

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
            $vehicle->setElectricSpecs($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): static
    {
        if ($this->vehicles->removeElement($vehicle)) {
            // set the owning side to null (unless already changed)
            if ($vehicle->getElectricSpecs() === $this) {
                $vehicle->setElectricSpecs(null);
            }
        }

        return $this;
    }
}

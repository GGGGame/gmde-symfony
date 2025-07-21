<?php

namespace App\Service\Resolver\Components;

use App\Entity\FuelSpecification;
use App\Factory\FuelSpecsFactory;
use App\interface\InterfaceResolver;
use App\Repository\FuelSpecificationRepository;

class FuelSpecsResolver implements InterfaceResolver
{
    public function __construct(
        private FuelSpecsFactory $fuelSpecsFactory,
        private FuelSpecificationRepository $fuelSpecsRepository
    ) {}

    public function resolve(array $data): FuelSpecification
    {
        return $this->fuelSpecsRepository->findOneByFields($data) ??
            $this->fuelSpecsFactory->createFuelSpecs($data);
    }

    public function supports(string $type): bool
    {
        return $type === 'fuel_specs';
    }
}
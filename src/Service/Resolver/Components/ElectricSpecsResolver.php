<?php

namespace App\Service\Resolver\Components;

use App\Entity\ElectricSpecification;
use App\Factory\ElectricSpecsFactory;
use App\interface\InterfaceResolver;
use App\Repository\ElectricSpecificationRepository;

class ElectricSpecsResolver implements InterfaceResolver
{
    public function __construct(
        private ElectricSpecsFactory $electricSpecsFactory,
        private ElectricSpecificationRepository $electricSpecsRepository
    ) {}

    public function resolve(array $data): ElectricSpecification
    {
        return $this->electricSpecsRepository->findOneByFields($data) ??
            $this->electricSpecsFactory->createElectricSpecs($data);
    }

    public function supports(string $type): bool
    {
        return $type === 'electric_specs';
    }
}
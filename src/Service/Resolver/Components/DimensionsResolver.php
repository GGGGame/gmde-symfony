<?php

namespace App\Service\Resolver\Components;

use App\Entity\VehicleDimensions;
use App\Factory\VehicleDimensionsFactory;
use App\interface\InterfaceResolver;
use App\Repository\VehicleDimensionsRepository;

class DimensionsResolver implements InterfaceResolver
{
    public function __construct(
        private VehicleDimensionsFactory $vehicleDimensionsFactory,
        private VehicleDimensionsRepository $vehicleDimensionsRepository
    ) {}

    public function resolve(array $data): VehicleDimensions
    {
        return $this->vehicleDimensionsRepository->findOneByFields($data) ??
            $this->vehicleDimensionsFactory->createVehicleDimensions($data);
    }

    public function supports(string $type): bool
    {
        return $type === 'vehicle_dimensions';
    }
}
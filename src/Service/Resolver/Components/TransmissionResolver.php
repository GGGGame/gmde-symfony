<?php

namespace App\Service\Resolver\Components;

use App\Entity\Transmission;
use App\Factory\TransmissionFactory;
use App\interface\InterfaceResolver;
use App\Repository\TransmissionRepository;

class TransmissionResolver implements InterfaceResolver
{
    public function __construct(
        private TransmissionFactory $transmissionFactory,
        private TransmissionRepository $transmissionRepository
    ) {}

    public function resolve(array $data): Transmission
    {
        return $this->transmissionRepository->findOneByFields($data) ??
            $this->transmissionFactory->createTransmission($data);
    }

    public function supports(string $type): bool
    {
        return $type === 'transmission';
    }
}
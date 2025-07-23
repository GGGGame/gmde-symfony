<?php

namespace App\Service\Resolver\Components;

use App\Entity\Transmission;
use App\Factory\TransmissionFactory;
use App\interface\ResolverInterface;
use App\Repository\TransmissionRepository;

class TransmissionResolver implements ResolverInterface
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
        return $type === Transmission::class;
    }
}
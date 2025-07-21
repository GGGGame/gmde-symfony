<?php

namespace App\Factory;

use App\Entity\Transmission;

class TransmissionFactory
{
    public function createTransmission(array $data): Transmission
    {
        $transmission = new Transmission();

        return $transmission
            ->setTransmission($data['transmission'] ?? null)
            ->setTransmissionDescriptor($data['transmissionDescriptor'] ?? null)
            ->setTCharger($data['tCharger'] ?? null)
            ->setSCharger($data['sCharger'] ?? null);
    }
}
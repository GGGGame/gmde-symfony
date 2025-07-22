<?php

namespace App\DTO;

class TransmissionDTO
{
    public function __construct(
        public ?int $id,
        public ?string $transmission,
        public ?string $transmissionDescriptor,
        public ?string $tCharger,
        public ?string $sCharger,
    )
    {
        
    }
}
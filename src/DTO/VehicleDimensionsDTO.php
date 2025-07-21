<?php

namespace App\DTO;

class VehicleDimensionsDTO
{
    public function __construct(
        public ?int $id,
        public ?int $hatchbackLuggageVolume,
        public ?int $hatchbackPassengerVolume,
        public ?int $twoDoorLuggageVolume,
        public ?int $fourDoorLuggageVolume,
        public ?int $twoDoorPassengerVolume,
        public ?int $fourDoorPassengerVolume
    )
    {
        
    }
}
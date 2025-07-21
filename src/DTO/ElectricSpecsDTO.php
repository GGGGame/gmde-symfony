<?php

class ElectricSpecsDTO
{
    public function __construct(
        public ?int $id,
        public ?int $timeToCharge120V,
        public ?int $timeToCharge240V,
        public ?string $c240Dscr,
        public ?string $charge240b,
        public ?string $c240BDscr,
        public ?string $electricMotor,
        public ?int $epaRangeFT2,
        public ?string $mfrCode,
        public ?int $phevCity,
        public ?int $phevHighway,
        public ?int $phevCombined
    )
    {
        
    }
}
<?php

namespace App\DTO;

class EngineDTO
{
    public function __construct(
        public ?int $id,
        public ?int $cylinder,
        public ?string $displacement,
        public ?string $drive,
        public ?string $engineDescriptor,
        public ?string $epaModelTypeIndex,
        public ?string $systemStartStop
    )
    {
        
    }
}
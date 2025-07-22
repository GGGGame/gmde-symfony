<?php

namespace App\DTO\Search;

class VehicleSearchResultDTO
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $brand,
        public readonly ?string $model,
        public readonly ?int $year
    ) {}
}
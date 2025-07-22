<?php

namespace App\DTO\Search;

class VehicleSearchResponseDTO
{
    public function __construct(
        public readonly array $data,
        public readonly PaginationDTO $pagination
    )
    {
        
    }
}
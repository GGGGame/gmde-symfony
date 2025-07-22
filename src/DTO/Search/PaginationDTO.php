<?php

namespace App\DTO\Search;

class PaginationDTO
{
    public function __construct(
        public readonly int $currentPage,
        public readonly int $totalPages,
        public readonly int $totalItems,
        public readonly int $itemsPerPage

    ) {}
}
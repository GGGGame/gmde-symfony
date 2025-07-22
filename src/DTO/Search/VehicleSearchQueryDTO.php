<?php

namespace App\DTO\Search;

use Symfony\Component\Validator\Constraints as Assert;

class VehicleSearchQueryDTO
{
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 255)]
    public readonly string $query;

    #[Assert\Range(min: 1, max: 1000)]
    public readonly int $page;

    #[Assert\Range(min: 1, max: 100)]
    public readonly int $limit;

    public function __construct(string $query, int $page, int $limit)
    {
        $this->query = $query;
        $this->page = $page;
        $this->limit = $limit;
    }
    
}
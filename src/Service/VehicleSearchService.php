<?php

namespace App\Service;

use App\DTO\Search\PaginationDTO;
use App\DTO\Search\VehicleSearchQueryDTO;
use App\DTO\Search\VehicleSearchResponseDTO;
use App\DTO\Search\VehicleSearchResultDTO;
use App\Repository\VehicleRepository;

class VehicleSearchService
{
    public function __construct(
        private VehicleRepository $vehicleRepository
    ) { }

    public function search(VehicleSearchQueryDTO $data): VehicleSearchResponseDTO
    {
        $offset = ($data->page - 1) * $data->limit;

        $vehicles = $this->vehicleRepository->searchByModel(
            $data->query,
            $offset,
            $data->limit
        );

        $total = $this->vehicleRepository->countByModel($data->query);

        $results = array_map(
            fn($vehicle) => new VehicleSearchResultDTO(
                $vehicle->getId(),
                $vehicle->getBrand(),
                $vehicle->getModel(),
                $vehicle->getYear()
            ),
            $vehicles
        );

        $pagination = new PaginationDTO(
            currentPage: $data->page,
            totalPages: (int)ceil($total / $data->limit),
            totalItems: $total,
            itemsPerPage: $data->limit
        );

        return new VehicleSearchResponseDTO($results, $pagination);
    }
}
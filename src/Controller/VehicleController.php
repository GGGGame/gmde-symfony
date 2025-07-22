<?php

namespace App\Controller;

use App\DTO\Search\VehicleSearchQueryDTO;
use App\Entity\Vehicle;
use App\Service\VehicleSearchService;
use App\Service\VehicleService;
use App\Trait\ApiResponseTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/models')]
class VehicleController extends AbstractController
{
    public function __construct(
        private VehicleSearchService $searchService,
        private ValidatorInterface $validator
    )
    {
        
    }

    #[Route('/{id}', name: '_single', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Vehicle $vehicle, VehicleService $vehicleService): JsonResponse
    {
        try {
            return $this->json([
                'status' => 'success',
                'data' => $vehicleService->getVehicleDTO($vehicle)
            ]);

        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Internal server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    #[Route('/search', name: '_search', methods: ['GET'])]
    public function search(Request $request): JsonResponse
    {
        try {
            $searchQuery = new VehicleSearchQueryDTO(
                query: $request->query->get('query', ''),
                page: $request->query->get('page', 1),
                limit: $request->query->get('limit', 10)
            );

            $validationErr = $this->validator->validate($searchQuery);
            if (count($validationErr) > 0) {
                $errors = [];
                foreach ($validationErr as $error) {
                    $errors[] = $error->getMessage();
                }

                return $this->json([
                    'status' => 'error',
                    'message' => 'Validation error',
                    'errors' => $errors
                ]);
            }

            $searchResponse = $this->searchService->search($searchQuery);

            if (empty($searchResponse->data)) {
                return $this->json([
                    'status' => 'error',
                    'message' => 'No results found'
                ]);
            }

            return $this->json([
                'status' => 'success',
                'data' => $searchResponse->data,
                'pagination' => $searchResponse->pagination
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Internal server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
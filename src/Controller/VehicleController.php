<?php

namespace App\Controller;

use App\DTO\VehicleDTO;
use App\Entity\Vehicle;
use App\Repository\VehicleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/models')]
class VehicleController extends AbstractController
{
    #[Route('/{id}', name: '_single', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Vehicle $vehicle): JsonResponse
    {
        try {
            return $this->json([
                'data' => new VehicleDTO($vehicle)
            ]);

        } catch (\Exception) {
            return $this->json(['error' => 'Internal server error'], 500);
        }
    }
}
<?php

namespace App\Service\Resolver\Components;

use App\Entity\Engine;
use App\Factory\EngineFactory;
use App\interface\ResolverInterface;
use App\Repository\EngineRepository;

class EngineResolver implements ResolverInterface
{
    public function __construct(
        private EngineFactory $engineFactory,
        private EngineRepository $engineRepository
    ) {}
    
    public function resolve(array $data): Engine
    {
        return $this->engineRepository->findOneByFields($data) ?? 
                $this->engineFactory->createEngine($data);
    }

    public function supports(string $type): bool
    {
        return $type === Engine::class;
    }
}
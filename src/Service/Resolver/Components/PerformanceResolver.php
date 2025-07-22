<?php

namespace App\Service\Resolver\Components;

use App\Entity\PerformanceData;
use App\Factory\PerformanceDataFactory;
use App\interface\ResolverInterface;
use App\Repository\PerformanceDataRepository;

class PerformanceResolver implements ResolverInterface
{
    public function __construct(
        private PerformanceDataRepository $performanceDataRepository,
        private PerformanceDataFactory $performanceDataFactory
    ) {}

    public function resolve(array $data): PerformanceData
    {
        return $this->performanceDataRepository->findOneByFields($data) ??
            $this->performanceDataFactory->createPerformanceData($data);
    }

    public function supports(string $type): bool
    {
        return $type === 'performance_data';
    }
}
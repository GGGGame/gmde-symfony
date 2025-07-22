<?php

namespace App\Mapper;

use App\interface\MapperInterface;

class MapperRegistry
{
    /**
     * @var iterable<MapperInterface>
     */
    public function __construct(
        private iterable $mappers
    )
    {
        
    }

    public function map(object $entity): object
    {
        foreach ($this->mappers as $mapper) {
            if ($mapper->supports($entity)) {
                return $mapper->toDTO($entity);
            }
        }

        throw new \InvalidArgumentException('No mapper found for entity ' . $entity);
    }
}
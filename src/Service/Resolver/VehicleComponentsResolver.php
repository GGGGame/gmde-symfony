<?php

namespace App\Service\Resolver;

use App\interface\InterfaceResolver;

class VehicleComponentsResolver
{
    /**
     * @param iterable<InterfaceResolver> $resolvers
     */
    public function __construct(
        private iterable $resolvers
    ) {}

    public function resolve(string $type, array $data, ): object
    {
        foreach ($this->resolvers as $resolver) {
            if ($resolver->supports($type)) {
                return $resolver->resolve($data);
            }
        }

        throw new \InvalidArgumentException('No resolver found for type: ' . $type);
    }
}
<?php

namespace App\Service\Resolver;

use App\interface\ResolverInterface;

class VehicleComponentsResolver
{
    /**
     * @param iterable<ResolverInterface> $resolvers
     */
    public function __construct(
        private iterable $resolvers
    ) {}

    public function resolve(string $type, array $data): object
    {
        foreach ($this->resolvers as $resolver) {
            if ($resolver->supports($type)) {
                return $resolver->resolve($data);
            }
        }

        throw new \InvalidArgumentException('No resolver found for type: ' . $type);
    }
}
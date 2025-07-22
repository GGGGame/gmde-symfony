<?php

namespace App\interface;

interface ResolverInterface
{
    public function resolve(array $data): object;
    public function supports(string $type): bool;
}
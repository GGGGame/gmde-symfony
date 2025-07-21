<?php

namespace App\interface;

interface InterfaceResolver
{
    public function resolve(array $data): object;
    public function supports(string $type): bool;
}
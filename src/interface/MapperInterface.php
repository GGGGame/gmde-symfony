<?php

namespace App\interface;

interface MapperInterface
{
    public function toDTO(object $entity): object;
    public function supports(object $entity): bool;
}
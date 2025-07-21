<?php

namespace App\Factory;

use App\Entity\Engine;

class EngineFactory
{
    public function createEngine(array $data): Engine
    {
        $engine = new Engine();

        $engine
            ->setCylinders((int)$data['cylinders'] ?? null)
            ->setDisplacement($data['engineDisplacement'] ?? null)
            ->setDrive($data['drive'] ?? null)
            ->setEngineDescriptor($data['engineDescriptor'] ?? null)
            ->setEpaModelTypeIndex((int)$data['ePAModelTypeIndex'] ?? null)
            ->setSystemStartStop($data['startStop'] ?? null);

        return $engine;
    }
}
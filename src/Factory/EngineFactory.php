<?php

namespace App\Factory;

use App\Entity\Engine;

class EngineFactory
{
    public function createEngine(array $data): Engine
    {
        $engine = new Engine();

        $engine->setCylinders((int)$data['cylinders'] ?? null);
        $engine->setDisplacement($data['engineDisplacement'] ?? null);
        $engine->setDrive($data['drive'] ?? null);
        $engine->setEngineDescriptor($data['engineDescriptor'] ?? null);
        $engine->setEpaModelTypeIndex((int)$data['ePAModelTypeIndex'] ?? null);
        $engine->setSystemStartStop($data['startStop'] ?? null);
        
        return $engine;
    }
}
<?php

namespace App\Factory;

use App\Entity\ElectricSpecification;

class ElectricSpecsFactory
{
    public function createElectricSpecs(array $data): ElectricSpecification
    {
        $electricSpecs = new ElectricSpecification();
        
        $electricSpecs
            ->setTimeToCharge120V($data['timeToChargeAt120V'] ?? null)
            ->setTimeToCharge240V($data['timeToChargeAt240V'] ?? null)
            ->setC240Dscr($data['c240Dscr'] ?? null)
            ->setCharge240b($data['charge240b'] ?? null)
            ->setC240BDscr($data['c240BDscr'] ?? null)
            ->setElectricMotor($data['electricMotor'] ?? null)
            ->setEpaRangeFT2((int)$data['epaRangeForFuelType2'] ?? null)
            ->setMfrCode($data['mFRCode'] ?? null)
            ->setPhevCity((int)$data['pHEVCity'] ?? null)
            ->setPhevHighway((int)$data['pHEVHighway'] ?? null)
            ->setPhevCombined((int)$data['pHEVCombined'] ?? null);

        return $electricSpecs;
    }
}
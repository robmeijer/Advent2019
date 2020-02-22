<?php

namespace App\Day1;

class FuelCalculator
{
    public function calculateForMass(int $mass): int
    {
        return round($mass / 3, 2, PHP_ROUND_HALF_DOWN) - 2;
    }
}

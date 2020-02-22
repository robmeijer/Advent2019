<?php

namespace App\Day1;

class FuelCalculator
{
    public function calculateForMass(int $mass): int
    {
        $fuel = round($mass / 3, 2, PHP_ROUND_HALF_DOWN) - 2;

        return $fuel > 0 ? $fuel : 0;
    }

    public function calculateForAccumulativeMass(int $mass): int
    {
        $fuel = $this->calculateForMass($mass);
        $fuelForFuel = $this->calculateForMass($fuel);
        do {
            $fuel += $fuelForFuel;
            $fuelForFuel = $this->calculateForMass($fuelForFuel);
        } while ($fuelForFuel > 0);

        return $fuel;
    }
}

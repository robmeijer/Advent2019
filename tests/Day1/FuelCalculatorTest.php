<?php

namespace App\Test\Day1;

use App\Day1\FuelCalculator;
use PHPUnit\Framework\TestCase;

class FuelCalculatorTest extends TestCase
{
    private FuelCalculator $fuelCalculator;

    protected function setUp(): void
    {
        $this->fuelCalculator = new FuelCalculator();
    }

    /** @dataProvider masses */
    public function testCalculateForMass(int $expected, int $mass): void
    {
        $this->assertSame($expected, $this->fuelCalculator->calculateForMass($mass));
    }

    /** @dataProvider accumulativeMasses */
    public function testCalculateForAccumulativeMass(int $expected, int $mass): void
    {
        $this->assertSame($expected, $this->fuelCalculator->calculateForAccumulativeMass($mass));
    }

    public function masses(): array
    {
        return [
            [2, 12],
            [2, 14],
            [654, 1969],
            [33583, 100756],
        ];
    }

    public function accumulativeMasses(): array
    {
        return [
            [2, 14],
            [966, 1969],
            [50346, 100756],
        ];
    }
}

<?php

namespace App\Test\Day3;

use App\Day3\Circuit;
use PHPUnit\Framework\TestCase;

class CircuitTest extends TestCase
{
    public function testAddWire(): void
    {
        $this->assertTrue(true);
    }

    /** @dataProvider wires */
    public function testCalculateDistance(int $expected, array $wires): void
    {
        $circuit = new Circuit($wires);

        $this->assertSame($expected, $circuit->calculateDistance());
    }

    public function wires(): array
    {
        return [
            [
                6,
                [
                    'R8,U5,L5,D3',
                    'U7,R6,D4,L4'
                ]
            ],
            [
                159,
                [
                    'R75,D30,R83,U83,L12,D49,R71,U7,L72',
                    'U62,R66,U55,R34,D71,R55,D58,R83'
                ]
            ],
            [
                135,
                [
                    'R98,U47,R26,D63,R33,U87,L62,D20,R33,U53,R51',
                    'U98,R91,D20,R16,D67,R40,U7,R15,U6,R7'
                ]
            ],
        ];
    }
}

<?php

namespace App\Test\Day2;

use App\Day2\IntCode;
use PHPUnit\Framework\TestCase;

class IntCodeTest extends TestCase
{
    private IntCode $intCode;

    protected function setUp(): void
    {
        $this->intCode = new IntCode();
    }

    /** @dataProvider programs */
    public function testRun(array $expected, array $program): void
    {
        $this->assertSame($expected, $this->intCode->run($program));
    }

    /** @dataProvider programsWithInputs */
    public function testRunWithInputs(int $expected, array $program, int $noun, int $verb): void
    {
        $this->assertSame($expected, $this->intCode->runWithInputs($program, $noun, $verb));
    }


    public function programs(): array
    {
        return [
            [[3500,9,10,70,2,3,11,0,99,30,40,50], [1,9,10,3,2,3,11,0,99,30,40,50]],
            [[2,0,0,0,99], [1,0,0,0,99]],
            [[2,3,0,6,99], [2,3,0,3,99]],
            [[2,4,4,5,99,9801], [2,4,4,5,99,0]],
            [[30,1,1,4,2,5,6,0,99], [1,1,1,4,99,5,6,0,99]],
        ];
    }

    public function programsWithInputs(): array
    {
        return [
            [3500, [1,9,10,3,2,3,11,0,99,30,40,50], 9, 10],
            [2, [1,0,0,0,99], 0, 0],
            [2, [2,3,0,3,99], 3, 0],
            [2, [2,4,4,5,99,0], 4, 4],
            [30, [1,1,1,4,99,5,6,0,99], 1, 1],
        ];
    }
}

<?php

namespace App\Day2;

use RuntimeException;

class IntCode
{
    public function run(array $program): array
    {
        $position = 1;
        foreach ($program as &$item) {
            switch ($position) {
                case 1:
                    $opCode = $item;
                    break;
                case 2:
                    $first = $item;
                    break;
                case 3:
                    $second = $item;
                    break;
                case 4:
                    switch ($opCode) {
                        case 1:
                            $program[$item] = $program[$first] + $program[$second];
                            break;
                        case 2:
                            $program[$item] = $program[$first] * $program[$second];
                            break;
                        case 99:
                            return $program;
                        default:
                            throw new RuntimeException('Something went wrong!');
                    }
                    $position = 0;
            }
            $position++;
        }

        return $program;
    }

    public function runWithInputs(array $program, int $noun, int $verb): int
    {
        $program[1] = $noun;
        $program[2] = $verb;

        $result = $this->run($program);

        return $result[0];
    }
}

<?php

namespace App\Day3;

class Circuit
{
    private array $wires;

    public function __construct(array $wires = [])
    {
        $this->wires = $wires;
    }

    public function addWire(string $wire): void
    {
        $this->wires[] = $wire;
    }

    public function calculateDistance(): int
    {
        $wirePositions = [[],[]];
        foreach ($this->wires as $id => $wire) {
            $currentPosition = [0, 0];
            $wireData = explode(',', $wire);
            foreach ($wireData as $instruction) {
                preg_match('/(?<direction>[URDL])(?<distance>\d+)/', $instruction, $matches);
                switch ($matches['direction']) {
                    case 'U':
                        for ($i = 1; $i <= $matches['distance']; $i++) {
                            ++$currentPosition[1];
                            $wirePositions[$id][] = $currentPosition;
                        }
                        break;
                    case 'R':
                        for ($i = 1; $i <= $matches['distance']; $i++) {
                            ++$currentPosition[0];
                            $wirePositions[$id][] = $currentPosition;
                        }
                        break;
                    case 'D':
                        for ($i = 1; $i <= $matches['distance']; $i++) {
                            --$currentPosition[1];
                            $wirePositions[$id][] = $currentPosition;
                        }
                        break;
                    case 'L':
                        for ($i = 1; $i <= $matches['distance']; $i++) {
                            --$currentPosition[0];
                            $wirePositions[$id][] = $currentPosition;
                        }
                        break;
                }
            }
        }

        $distances = [];

        foreach ($wirePositions[0] as $wirePosition) {
            if (in_array($wirePosition, $wirePositions[1], true)) {
                foreach ($wirePosition as &$position) {
                    $position = abs($position);
                }
                unset($position);

                $distances[] = array_sum($wirePosition);
            }
        }

        sort($distances);

        return $distances[0];
    }
}

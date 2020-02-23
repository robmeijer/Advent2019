<?php

namespace App\Day3;

class Circuit
{
    public function calculateDistance(string $first, string $second): int
    {
        return min(array_map(static function ($cross) {
            return array_sum(array_map('abs', $cross));
        }, array_map('unserialize', array_intersect(
            array_map('serialize', $this->plotWire($first)),
            array_map('serialize', $this->plotWire($second))
        ))));
    }

    private function plotWire(string $wire): array
    {
        $wirePositions = [];
        $currentPosition = [0, 0];

        foreach (explode(',', $wire) as $instruction) {
            preg_match('/(?<direction>[URDL])(?<distance>\d+)/', $instruction, $matches);
            for ($i = 1; $i <= $matches['distance']; $i++) {
                $currentPosition = $this->adjustPosition($currentPosition, $matches['direction']);
                $wirePositions[] = $currentPosition;
            }
        }

        return $wirePositions;
    }

    private function adjustPosition(array $currentPosition, string $direction): array
    {
        switch ($direction) {
            case 'U':
                ++$currentPosition[1];
                break;
            case 'R':
                ++$currentPosition[0];
                break;
            case 'D':
                --$currentPosition[1];
                break;
            case 'L':
                --$currentPosition[0];
                break;
        }

        return $currentPosition;
    }
}

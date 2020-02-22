<?php

use App\Day1\FuelCalculator;
use League\Flysystem\Filesystem;

$container = require __DIR__ . '/../bootstrap/container.php';

$contents = $container->get(Filesystem::class)->read('day1.txt');
preg_match_all('/(?<masses>.+)/', $contents, $matches);
[$masses] = $matches;

echo array_sum(array_map(static function ($mass) use ($container) {
        return $container->get(FuelCalculator::class)->calculateForMass($mass);
    }, $masses)) . PHP_EOL;

echo array_sum(array_map(static function ($mass) use ($container) {
        return $container->get(FuelCalculator::class)->calculateForAccumulativeMass($mass);
    }, $masses)) . PHP_EOL;

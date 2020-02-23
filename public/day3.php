<?php

use App\Day1\FuelCalculator;
use App\Day2\IntCode;
use App\Day3\Circuit;
use League\Flysystem\Filesystem;

$container = require __DIR__ . '/../bootstrap/container.php';

$contents = $container->get(Filesystem::class)->read('day3.txt');
preg_match_all('/(?<wires>.+)/', $contents, $matches);
[$wires] = $matches;

[$firstWire, $secondWire] = $wires;

echo $container->get(Circuit::class)->calculateDistance($firstWire, $secondWire) . PHP_EOL;

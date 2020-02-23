<?php

use App\Day1\FuelCalculator;
use App\Day2\IntCode;
use App\Day3\Circuit;
use League\Flysystem\Filesystem;

$container = require __DIR__ . '/../bootstrap/container.php';

$contents = $container->get(Filesystem::class)->read('day3.txt');
preg_match_all('/(?<wires>.+)/', $contents, $matches);
[$wires] = $matches;

$circuit = $container->get(Circuit::class);

foreach ($wires as $wire) {
    $circuit->addWire($wire);
}

echo $circuit->calculateDistance() . PHP_EOL;

<?php

use App\Day1\FuelCalculator;
use App\Day2\IntCode;
use League\Flysystem\Filesystem;

$container = require __DIR__ . '/../bootstrap/container.php';

$contents = $container->get(Filesystem::class)->read('day2.txt');
preg_match_all('/(?<data>.+)/', $contents, $matches);
[$data] = $matches;

echo $container->get(IntCode::class)->runWithInputs(explode(',', $data[0]), 12, 2) . PHP_EOL;

for ($noun = 0; $noun <= 99; $noun++) {
    for ($verb = 0; $verb <= 99; $verb++)
    {
        $result = $container->get(IntCode::class)->runWithInputs(explode(',', $data[0]), $noun, $verb);
        if ($result === 19690720) {
            echo 100 * $noun + $verb . PHP_EOL;
            break;
        }
    }
}

<?php

use App\Day1\FuelCalculator;
use App\Day2\IntCode;
use League\Container\Argument\RawArgument;
use League\Container\Container;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

require_once __DIR__ . '/../vendor/autoload.php';

$container = new Container();

$container->add(Local::class)->addArgument(new RawArgument(__DIR__ . '/../input'));
$container->add(Filesystem::class)->addArgument(Local::class);

// -----------------------------------------------------------------------------
// --------------------------------- DAY 1 -------------------------------------
// -----------------------------------------------------------------------------
$container->add(FuelCalculator::class);

// -----------------------------------------------------------------------------
// --------------------------------- DAY 2 -------------------------------------
// -----------------------------------------------------------------------------
$container->add(IntCode::class);

return $container;

<?php

use Neighborhoods\BuphaloFitness\Demo1\V1;
use Neighborhoods\Buphalo\Protean\Container;

require_once (__DIR__ . '/../vendor/autoload.php');

$containerBuilder = new Container\Builder();
$containerBuilder
    ->setApplicationRootDirectoryPath(realpath(__DIR__ . '/../'))
    ->setCachedContainerFileName('hello_world.php')
    ->setCanBuildZendExpressive(false)
    ->setCanCacheContainer(true);

$containerBuilder->registerServiceAsPublic(V1\Speaker\FactoryInterface::class);

$container = $containerBuilder->build();

/** @var V1\Speaker\FactoryInterface $speakerFactory */
$speakerFactory = $container->get(V1\Speaker\FactoryInterface::class);
$speaker = $speakerFactory->create();

$speaker->say('Hello Neighbors!');

#! /usr/bin/env php
<?php

use Neighborhoods\BuphaloFitness\Demo1\V1\Speaker;
use Neighborhoods\Buphalo\V1\Protean\Container;

require_once (__DIR__ . '/../vendor/autoload.php');

$containerBuilder = new Container\Builder();
$containerBuilder
    ->setApplicationRootDirectoryPath(realpath(__DIR__ . '/../'))
    ->setCachedContainerFileName('hello_world.php')
    ->setCanBuildZendExpressive(false)
    ->setCanCacheContainer(true);

$containerBuilder->registerServiceAsPublic(Speaker\FactoryInterface::class);

$container = $containerBuilder->build();

/** @var Speaker\FactoryInterface $speakerFactory */
$speakerFactory = $container->get(Speaker\FactoryInterface::class);
$speaker = $speakerFactory->create();

$speaker->say('Hello Neighbors!');

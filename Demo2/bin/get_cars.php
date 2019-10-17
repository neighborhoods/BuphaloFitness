<?php

use Neighborhoods\BuphaloFitness\Demo2\DOR;
use Neighborhoods\Buphalo\Protean\Container;

require_once (__DIR__ . '/../vendor/autoload.php');

$containerBuilder = new Container\Builder();
$containerBuilder
    ->setApplicationRootDirectoryPath(realpath(__DIR__ . '/../'))
    ->setCachedContainerFileName('get_cars.php')
    ->setCanBuildZendExpressive(false)
    ->setCanCacheContainer(false);

$containerBuilder->registerServiceAsPublic(DOR\V1\Car\Map\RepositoryInterface::class);

$container = $containerBuilder->build();

/** @var DOR\V1\Car\Map\RepositoryInterface $repository */
$repository = $container->get(DOR\V1\Car\Map\RepositoryInterface::class);

$cars = $repository->getAll();

var_export($cars);

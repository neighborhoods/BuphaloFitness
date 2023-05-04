<?php

declare(strict_types=1);

require_once(__DIR__ . '/../../vendor/autoload.php');

use Neighborhoods\BuphaloFitness\TemplateDemo1\V1\CarInterface;
use Neighborhoods\BuphaloFitness\TemplateDemo1\V1\Car\Builder\FactoryInterface;
use Neighborhoods\BuphaloFitness\TemplateDemo1\V1\PersonInterface;
use Neighborhoods\DependencyInjectionContainerBuilderComponent\SymfonyConfigCacheHandler;
use Neighborhoods\DependencyInjectionContainerBuilderComponent\TinyContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\AnalyzeServiceReferencesPass;
use Symfony\Component\DependencyInjection\Compiler\InlineServiceDefinitionsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder as SymfonyContainerBuilder;

$cacheDir = __DIR__ . '/container_cache/';
if (!is_dir($cacheDir) && mkdir($cacheDir) && !is_dir($cacheDir)) {
    throw new \RuntimeException(sprintf('Directory "%s" was not created', $cacheDir));
}

$cacheHandler = (new SymfonyConfigCacheHandler\Builder())
    ->setName('test_car_builder')
    ->setCacheDirPath(__DIR__ . '/container_cache/')
    ->setDebug(false)
    ->build();

$containerBuilder = new TinyContainerBuilder();
$containerBuilder
    ->setContainerBuilder(new SymfonyContainerBuilder())
    ->addCompilerPass(new AnalyzeServiceReferencesPass())
    ->addCompilerPass(new InlineServiceDefinitionsPass())
    ->setRootPath(__DIR__ . '/../../')
    ->setCacheHandler($cacheHandler);

$paths = ['src/V1', 'fab/V1'];
foreach($paths as $path) {
    $pathDir = __DIR__ . '/../../' . $path;
    //echo "Checking $pathDir" . PHP_EOL;
    if (\file_exists($pathDir)) {
        //echo "Adding $pathDir" . PHP_EOL;
        $containerBuilder->addSourcePath($path);
    }
}

$containerBuilder->makePublic(FactoryInterface::class);

echo 'Building container.' . PHP_EOL;
$container = $containerBuilder->build();
echo 'Successfully built container.' . PHP_EOL;

/** @var FactoryInterface $builderFactory */
$builderFactory = $container->get(FactoryInterface::class);
$builder = $builderFactory->create();
$builder->setRecord([
    CarInterface::PROP_VIN => 1,
    CarInterface::PROP_MAKE => 'Jeep',
    CarInterface::PROP_MODEL => 'Cherokee',
    CarInterface::PROP_YEAR => 2020,
    CarInterface::PROP_INSURANCE_NUMBER => null,
    CarInterface::PROP_OWNER => [
        PersonInterface::PROP_NAME => 'Jacques Marcotte',
        PersonInterface::PROP_AGE => 41,
    ],
    CarInterface::PROP_CURRENT_DRIVER => null,
]);

$car = $builder->build();

echo json_encode($car, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT) . PHP_EOL;

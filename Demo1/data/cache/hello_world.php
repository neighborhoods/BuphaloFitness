<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class ProjectServiceContainer extends Container
{
    private $parameters = [];
    private $targetDirs = [];

    public function __construct()
    {
        $this->services = $this->privates = [];
        $this->methodMap = [
            'Neighborhoods\\BuphaloFitness\\Demo1\\V1\\Speaker\\FactoryInterface' => 'getFactoryInterfaceService',
        ];

        $this->aliases = [];
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function getRemovedIds()
    {
        return [
            'Neighborhoods\\BuphaloFitness\\Demo1\\V1\\SpeakerInterface' => true,
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
        ];
    }

    /**
     * Gets the public 'Neighborhoods\BuphaloFitness\Demo1\V1\Speaker\FactoryInterface' shared service.
     *
     * @return \Neighborhoods\BuphaloFitness\Demo1\V1\Speaker\Factory
     */
    protected function getFactoryInterfaceService()
    {
        $this->services['Neighborhoods\\BuphaloFitness\\Demo1\\V1\\Speaker\\FactoryInterface'] = $instance = new \Neighborhoods\BuphaloFitness\Demo1\V1\Speaker\Factory();

        $instance->setV1Speaker(new \Neighborhoods\BuphaloFitness\Demo1\V1\Speaker());

        return $instance;
    }
}

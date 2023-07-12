<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final
 */
class Testcarbuilder extends Container
{
    private $parameters = [];

    public function __construct()
    {
        $this->services = $this->privates = [];
        $this->methodMap = [
            'Neighborhoods\\BuphaloFitness\\TemplateDemo1\\V1\\Car\\Builder\\FactoryInterface' => 'getFactoryInterfaceService',
        ];

        $this->aliases = [];
    }

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    public function getRemovedIds(): array
    {
        return [
            'Neighborhoods\\BuphaloFitness\\TemplateDemo1\\V1\\CarInterface' => true,
            'Neighborhoods\\BuphaloFitness\\TemplateDemo1\\V1\\Car\\BuilderInterface' => true,
            'Neighborhoods\\BuphaloFitness\\TemplateDemo1\\V1\\Car\\FactoryInterface' => true,
            'Neighborhoods\\BuphaloFitness\\TemplateDemo1\\V1\\PersonInterface' => true,
            'Neighborhoods\\BuphaloFitness\\TemplateDemo1\\V1\\Person\\BuilderInterface' => true,
            'Neighborhoods\\BuphaloFitness\\TemplateDemo1\\V1\\Person\\Builder\\FactoryInterface' => true,
            'Neighborhoods\\BuphaloFitness\\TemplateDemo1\\V1\\Person\\FactoryInterface' => true,
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
        ];
    }

    /**
     * Gets the public 'Neighborhoods\BuphaloFitness\TemplateDemo1\V1\Car\Builder\FactoryInterface' shared service.
     *
     * @return \Neighborhoods\BuphaloFitness\TemplateDemo1\V1\Car\Builder\Factory
     */
    protected function getFactoryInterfaceService()
    {
        $this->services['Neighborhoods\\BuphaloFitness\\TemplateDemo1\\V1\\Car\\Builder\\FactoryInterface'] = $instance = new \Neighborhoods\BuphaloFitness\TemplateDemo1\V1\Car\Builder\Factory();

        $a = new \Neighborhoods\BuphaloFitness\TemplateDemo1\V1\Car\Builder();

        $b = new \Neighborhoods\BuphaloFitness\TemplateDemo1\V1\Car\Factory();
        $b->setV1Car(new \Neighborhoods\BuphaloFitness\TemplateDemo1\V1\Car());
        $c = new \Neighborhoods\BuphaloFitness\TemplateDemo1\V1\Person\Builder\Factory();

        $d = new \Neighborhoods\BuphaloFitness\TemplateDemo1\V1\Person\Builder();

        $e = new \Neighborhoods\BuphaloFitness\TemplateDemo1\V1\Person\Factory();
        $e->setV1Person(new \Neighborhoods\BuphaloFitness\TemplateDemo1\V1\Person());

        $d->setV1PersonFactory($e);

        $c->setV1PersonBuilder($d);

        $a->setV1CarFactory($b);
        $a->setV1PersonBuilderFactory($c);

        $instance->setV1CarBuilder($a);

        return $instance;
    }
}

<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo2\DOR\V1\Car\Map;

use Neighborhoods\BuphaloFitness\Demo2\DOR\V1\Car;
use Neighborhoods\BuphaloFitness\Demo2\DOR\V1\Car\MapInterface;

class Repository implements RepositoryInterface
{
    use Car\Map\Builder\Factory\AwareTrait;

    protected $connection;

    public function createBuilder() : BuilderInterface
    {
        return $this->getDORV1CarMapBuilderFactory()->create();
    }

    public function getAll() : MapInterface
    {
        $mapBuilder = $this->getDORV1CarMapBuilderFactory()->create();
        $mapBuilder->setRecords($this->fetch());
        return $mapBuilder->build();
    }

    private function fetch() : array
    {
        return [
            [
                'color' => 'red',
                'make' => 'Tesla',
                'model' => 'S'
            ],
            [
                'color' => 'silver',
                'make' => 'Jeep',
                'model' => 'Cherokee'
            ]
        ];
    }
}

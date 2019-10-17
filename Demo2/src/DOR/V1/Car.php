<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo2\DOR\V1;

class Car implements CarInterface
{
    /** @var string */
    public $model;

    /** @var string */
    public $color;

    /** @var string */
    public $make;

    public function getModel(): string
    {
        if ($this->model === null) {
            throw new \LogicException('Car model has not been set.');
        }

        return $this->model;
    }

    public function hasModel(): bool
    {
        return $this->model !== null;
    }

    public function setModel(string $model): CarInterface
    {
        if ($this->model !== null) {
            throw new \LogicException('Car model is already set.');
        }

        $this->model = $model;

        return $this;
    }

    public function getColor(): string
    {
        if ($this->color === null) {
            throw new \LogicException('Car color has not been set.');
        }

        return $this->color;
    }

    public function hasColor(): bool
    {
        return $this->color !== null;
    }

    public function setColor(string $color): CarInterface
    {
        if ($this->color !== null) {
            throw new \LogicException('Car color is already set.');
        }

        $this->color = $color;

        return $this;
    }

    public function getMake(): string
    {
        if ($this->make === null) {
            throw new \LogicException('Car vin has not been set.');
        }

        return $this->make;
    }

    public function hasMake(): bool
    {
        return $this->make !== null;
    }

    public function setMake(string $make): CarInterface
    {
        if ($this->make !== null) {
            throw new \LogicException('Car vin is already set.');
        }

        $this->make = $make;

        return $this;
    }
}

<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo2\DOR\V1;

class Car implements CarInterface
{
    /** @var int */
    private $year;

    /** @var string */
    private $make;

    /** @var string */
    private $model;

    public function getYear(): int
    {
        if ($this->year === null) {
            throw new \LogicException('Car color has not been set.');
        }

        return $this->year;
    }

    public function hasYear(): bool
    {
        return $this->year !== null;
    }

    public function setYear(int $color): CarInterface
    {
        if ($this->year !== null) {
            throw new \LogicException('Car color is already set.');
        }

        $this->year = $color;

        return $this;
    }

    public function getMake(): string
    {
        if ($this->make === null) {
            throw new \LogicException('Car make has not been set.');
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
            throw new \LogicException('Car make is already set.');
        }

        $this->make = $make;

        return $this;
    }

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
}

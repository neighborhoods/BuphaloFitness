<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo2\DOR\V1;

interface CarInterface
{

    public function getModel(): string;

    public function hasYear(): bool;

    public function setYear(int $color): CarInterface;

    public function hasModel(): bool;

    public function setModel(string $model): CarInterface;

    public function getMake(): string;

    public function setMake(string $make): CarInterface;

    public function hasMake(): bool;

    public function getYear(): int;
}

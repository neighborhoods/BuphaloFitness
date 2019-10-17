<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloFitness\Demo2\DOR\V1;

interface CarInterface
{

    public function getModel(): string;

    public function hasColor(): bool;

    public function setColor(string $color): CarInterface;

    public function hasModel(): bool;

    public function setModel(string $model): CarInterface;

    public function getMake(): string;

    public function hasMake(): bool;

    public function setMake(string $vin): CarInterface;

    public function getColor(): string;
}

<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\Actor\Map;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\Actor\MapInterface;
use Neighborhoods\BuphaloTemplateTree\Actor;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;
    use Actor\Builder\Factory\AwareTrait;

    protected $records;

    public function build(): MapInterface
    {
        $map = $this->getActorMapFactory()->create();

        foreach($this->getRecords() as $record) {
            $builder = $this->getActorBuilderFactory()->create();
            $map[] = $builder->setRecord($record)->build();
        }

        return $map;
    }

    protected function getRecords(): array
    {
        if ($this->records === null) {
            throw new LogicException('Builder records has not been set.');
        }

        return $this->records;
    }

    public function setRecords(array $records): BuilderInterface
    {
        if ($this->records !== null) {
            throw new LogicException('Builder records is already set.');
        }

        $this->records = $records;

        return $this;
    }
}

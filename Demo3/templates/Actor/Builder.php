<?php
declare(strict_types=1);

namespace Neighborhoods\BuphaloTemplateTree\Actor;

use LogicException;
use Neighborhoods\BuphaloTemplateTree\ActorInterface;

class Builder implements BuilderInterface
{
    use Factory\AwareTrait;

    protected $record;

    public function build(): ActorInterface
    {
        $Actor = $this->getActorFactory()->create();

        $record = $this->getRecord();

/** @neighborhoods-buphalo:annotation-processor DaoBuilder
        // @TODO - build the object.
        throw new \LogicException('Unimplemented build method.');
 */

        return $Actor;
    }

    protected function getRecord(): array
    {
        if ($this->record === null) {
            throw new LogicException('Builder record has not been set.');
        }

        return $this->record;
    }

    public function setRecord(array $record): BuilderInterface
    {
        if ($this->record !== null) {
            throw new LogicException('Builder record is already set.');
        }

        $this->record = $record;

        return $this;
    }
}

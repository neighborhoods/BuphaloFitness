<?php

namespace Neighborhoods\BuphaloFitness\Demo3\AnnotationProcessors\DAO;

use Neighborhoods\Buphalo\AnnotationProcessor\ContextInterface;
use Neighborhoods\Buphalo\AnnotationProcessorInterface;

class Builder implements AnnotationProcessorInterface
{
    /** @var ContextInterface */
    private $context;

    public function setAnnotationProcessorContext(ContextInterface $Context)
    {
        if ($this->context !== null) {
            throw new \LogicException('DAO Annotation Processor context is already set');
        }

        $this->context = $Context;
    }

    public function getAnnotationProcessorContext(): ContextInterface
    {
        if ($this->context === null) {
            throw new \LogicException('DAO Annotation Processor context is not set');
        }

        return $this->context;
    }

    public function getReplacement(): string
    {
        $context = $this->getAnnotationProcessorContext()->getStaticContextRecord();

        $accessors = [];

        foreach($context as $field) {
            $name = $field['name'];

            $accessors[] = $this->buildAccessors($name);
        }

        return implode($accessors, PHP_EOL);
    }

    private function buildAccessors($name): string
    {
        $upperName = ucfirst($name);
        $actor = $this->getAnnotationProcessorContext()->getFabricationFile()->getFileName();

        return <<<EOC
        \${$actor}->set$upperName(\$record['$name']);
EOC;
    }
}

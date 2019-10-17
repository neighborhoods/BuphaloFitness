<?php

namespace Neighborhoods\BuphaloFitness\Demo3\AnnotationProcessors;

use Neighborhoods\Buphalo\AnnotationProcessor\ContextInterface;
use Neighborhoods\Buphalo\AnnotationProcessorInterface;

class DAOInterface implements AnnotationProcessorInterface
{
    /** @var ContextInterface */
    private $context;

    public function setAnnotationProcessorContext(ContextInterface $Context)
    {
        if ($this->context !== null) {
            throw new \LogicException('DAOInterface Annotation Processor context is already set');
        }

        $this->context = $Context;
    }

    public function getAnnotationProcessorContext(): ContextInterface
    {
        if ($this->context === null) {
            throw new \LogicException('DAOInterface Annotation Processor context is not set');
        }

        return $this->context;
    }

    public function getReplacement(): string
    {
        $context = $this->getAnnotationProcessorContext()->getStaticContextRecord();

        $accessors = [];

        foreach($context as $field) {
            $name = $field['name'];
            $type = $field['type'];

            $accessors[] = $this->buildAccessors($name, $type);
        }

        return implode($accessors, PHP_EOL . PHP_EOL);
    }

    private function buildAccessors($name, $type): string
    {
        $upperName = ucfirst($name);
        $interface = $this->getAnnotationProcessorContext()->getFabricationFile()->getFileName() . 'Interface';

        return <<<EOC
     public function get$upperName(): $type;
     public function set$upperName($type \$$name): $interface;
EOC;
    }
}

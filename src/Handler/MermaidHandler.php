<?php
namespace Adam314\PhpGrapher\Handler;

use Adam314\PhpGrapher\CodeTraverser\Relation;

class MermaidHandler implements HandlerInterface
{
    protected $data = [];

    public function __construct()
    {
        $this->data[] = 'flowchart LR';
    }

    public function handleClass(string $className): void
    {
        // TODO: Implement handleClass() method.
    }

    public function handleMethod(string $methodName, string $className): void
    {
        // TODO: Implement handleMethod() method.
    }

    public function handleProperty(string $propertyName, string $className): void
    {
        // TODO: Implement handleProperty() method.
    }

    public function handleDependency(string $dependencyName): void
    {
        // TODO: Implement handleDependency() method.
    }

    public function handleRelation(string $source, Relation $relationType, string $target): void
    {
        $this->data[] = sprintf("    %s-->|%s|%s", $source, $relationType->value, $target);
    }

    public function getMermaidChart()
    {
        return implode("\n", $this->data);
    }
}
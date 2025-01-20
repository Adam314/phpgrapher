<?php
namespace Adam314\PhpGrapher\Handler;

use Adam314\PhpGrapher\CodeTraverser\Relation;

/**
 * This class does nothing in all the methods.
 * It's useful for implementing only selected handle methods, just create subclass of it
 * and override only the methods you want
 */
class EmptyHandler implements HandlerInterface
{

    public function handleClass(string $className): void
    {
    }

    public function handleMethod(string $methodName, string $className): void
    {
    }

    public function handleProperty(string $propertyName, string $className): void
    {
    }

    public function handleDependency(string $dependencyName): void
    {
    }

    public function handleRelation(string $source, Relation $relationType, string $target): void
    {
    }
}
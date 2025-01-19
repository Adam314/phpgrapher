<?php
namespace Adam314\PhpGrapher\Handler;

interface HandlerInterface
{
    public function handleClass(string $className): void;
    public function handleMethod(string $methodName, string $className): void;
    public function handleProperty(string $propertyName, string $className): void;
    public function handleDependency(string $dependencyName): void;

    // New method for handling relations
    public function handleRelation(string $source, string $relationType, string $target): void;
}


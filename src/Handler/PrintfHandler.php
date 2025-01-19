<?php
namespace Adam314\PhpGrapher\Handler;

class PrintfHandler implements HandlerInterface
{

    public function handleClass(string $className): void
    {
        printf("%s\n", $className);
    }

    public function handleMethod(string $methodName, string $className): void
    {
        printf("%s::%s()\n", $className, $methodName);
    }

    public function handleProperty(string $propertyName, string $className): void
    {
        printf("%s->%s\n", $className, $propertyName);
    }

    public function handleDependency(string $dependencyName): void
    {
        printf("depends on %s\n", $dependencyName);
    }

    public function handleRelation(string $source, string $relationType, string $target): void
    {
        printf("%s --[%s]--> %s\n", $source, $relationType, $target);
    }
}
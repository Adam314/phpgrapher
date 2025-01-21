<?php
namespace Adam314\PhpGrapher\CodeTraverser;

use Adam314\PhpGrapher\Handler\HandlerInterface;

class CodeTraverser {

    protected bool $traverseInterfaces = true;
    protected bool $traverseClasses = true;
    protected bool $traverseTraits = true;
    protected bool $traverseMethods = true;
    protected bool $traverseProperties = true;

    public function __construct(protected HandlerInterface $handler)
    {}

    public function traverseClass(string $className, int $depth = 5): void
    {
        if ($depth <= 0) {
            return;
        }

        if (!class_exists($className)) {
            throw new \InvalidArgumentException("Class $className does not exist.");
        }

        $reflectionClass = new \ReflectionClass($className);

        // Handle the class itself
        $this->handler->handleClass($className);

        // Handle parent class relation
        if ($parentClass = $reflectionClass->getParentClass()) {
            $this->handler->handleRelation($className, Relation::EXTENDS_CLASS, $parentClass->getName());
            $this->traverseClass($parentClass->getName(), $depth - 1);
        }

        if ($this->traverseInterfaces) {
            foreach ($reflectionClass->getInterfaceNames() as $interface) {
                $this->handler->handleRelation($className, Relation::IMPLEMENTS_INTERFACE, $interface);
            }
        }

        if ($this->traverseTraits) {
            foreach ($reflectionClass->getTraitNames() as $trait) {
                $this->handler->handleRelation($className, Relation::USES_TRAIT, $trait);
            }
        }

        if ($this->traverseMethods) {
            foreach ($reflectionClass->getMethods() as $method) {
                $this->handler->handleMethod($method->getName(), $className);
                $this->handler->handleRelation($className, Relation::HAS_METHOD, $method->getName());
            }
        }

        if ($this->traverseProperties) {
            foreach ($reflectionClass->getProperties() as $property) {
                $this->handler->handleProperty($property->getName(), $className);
                $this->handler->handleRelation($className, Relation::HAS_PROPERTY, $property->getName());
            }
        }
    }
}
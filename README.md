# phpgrapher
A tool to draw diagrams of php classes

Goal:

A code like:
````php
$traverser = new CodeTraverser(new PrintfHandler());
$traverser->traverseClass(SomeClass::class); 
````
Should produce output including all subclasses, interfaces, traits and superclasses plus all classes used in the constructor arguments.

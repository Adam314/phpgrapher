<?php
namespace Adam314\PhpGrapher\CodeTraverser;

enum Relation: string
{
    case EXTENDS_CLASS = 'extends class';
    case IMPLEMENTS_INTERFACE = 'implements';
    case USES_TRAIT = 'uses trait';
    case HAS_METHOD = 'has method';
    case HAS_PROPERTY = 'has property';
    case USES = 'uses';
}
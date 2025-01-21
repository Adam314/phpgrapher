<?php
namespace Adam314\PhpGrapher\Tests;
use Adam314\PhpGrapher\CodeTraverser\CodeTraverser;
use Adam314\PhpGrapher\Handler\MermaidHandler;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$handler = new MermaidHandler('TB');
$traverser = new CodeTraverser($handler);

$traverser->traverseClass(MermaidHandler::class);

echo $handler->getMermaidChart();
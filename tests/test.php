<?php
namespace Adam314\PhpGrapher\Tests;
use Adam314\PhpGrapher\CodeTraverser\CodeTraverser;
use Adam314\PhpGrapher\Handler\PrintfHandler;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$handler = new PrintfHandler();
$traverser = new CodeTraverser($handler);

$traverser->traverseClass(PrintfHandler::class);
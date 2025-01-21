<?php
namespace Adam314\PhpGrapher\Handler;

use Adam314\PhpGrapher\CodeTraverser\Relation;

class MermaidHandler extends EmptyHandler
{
    protected $data = [];

    /**
     * @param string $flowchartType Possible options: TB, BT, RL, LR
     */
    public function __construct(string $flowchartType = 'LR')
    {
        $this->data[] = 'flowchart ' . $flowchartType;
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
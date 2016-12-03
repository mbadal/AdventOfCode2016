<?php namespace AdventOfCode\Solver;


abstract class SolverAbstract {
    /** @var string */
    protected $riddleInput;

    public function __construct($riddleInput) {
        $this->riddleInput = $riddleInput;
    }

    public abstract function solve();
}
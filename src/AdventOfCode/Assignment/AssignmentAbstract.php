<?php namespace AdventOfCode\Assignment;

use AdventOfCode\Solver\Solver1;
use AdventOfCode\FileReader;

abstract class AssignmentAbstract {

    const DIR_NAME   = '';
    const INPUT_NAME = 'input.txt';

    /** @var  FileReader */
    protected $reader;

    /** @var  Solver1 */
    protected $solver;

    public function __construct($projectRootPath) {
        $filePath     = $projectRootPath . '/input/' . static::DIR_NAME . '/' . static::INPUT_NAME;
        $this->reader = new FileReader($filePath);
    }

    public abstract function solve();
}
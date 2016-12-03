<?php namespace AdventOfCode\Assignment;

use AdventOfCode\Solver\Solver;
use AdventOfCode\FileReader;

abstract class AssignmentAbstract {

    const DIR_NAME   = '';
    const INPUT_NAME = 'input.txt';

    /** @var  FileReader */
    protected $reader;

    /** @var  Solver */
    protected $solver;

    public function __construct(string $projectRootPath) {
        $filePath     = $projectRootPath . '/input/' . static::DIR_NAME . '/' . static::INPUT_NAME;
        $this->reader = new FileReader($filePath);
    }

    public function solve() {
        $this->reader->readFile();
        $fileContents = $this->reader->getFileContents();
        $this->solver = new Solver($fileContents);
        $this->solver->solve1();
    }
}
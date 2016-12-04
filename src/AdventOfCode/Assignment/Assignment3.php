<?php namespace AdventOfCode\Assignment;


use AdventOfCode\Solver\Solver3;

class Assignment3 extends AssignmentAbstract {
    const DIR_NAME = 'assignment3';

    public function solve() {
        $this->reader->readFile();
        $fileContents = $this->reader->getFileContents();

        $solver = new Solver3($fileContents);
        $solver->solve();
    }
}
<?php namespace AdventOfCode\Assignment;


use AdventOfCode\Solver\Solver4;

class Assignment4 extends AssignmentAbstract {
    const DIR_NAME = 'assignment4';

    public function solve() {
        $this->reader->readFile();
        $fileContents = $this->reader->getFileContents();

        $solver = new Solver4($fileContents);
        $solver->solve();
    }
}
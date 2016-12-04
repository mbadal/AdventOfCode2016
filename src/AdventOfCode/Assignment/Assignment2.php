<?php namespace AdventOfCode\Assignment;


use AdventOfCode\Solver\Solver2;

class Assignment2 extends AssignmentAbstract {
    const DIR_NAME = 'assignment2';

    public function solve() {
        $this->reader->readFile();
        $fileContents = $this->reader->getFileContents();
        $this->solver = new Solver2($fileContents);
        $this->solver->solve();
        $this->solver->solveB();
    }
}
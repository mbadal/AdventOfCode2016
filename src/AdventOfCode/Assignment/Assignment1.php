<?php namespace AdventOfCode\Assignment;


use AdventOfCode\Solver\Solver1;

class Assignment1 extends AssignmentAbstract {
    const DIR_NAME = 'assignment1';

    public function solve() {
        $this->reader->readFile();
        $fileContents = $this->reader->getFileContents();
        $this->solver = new Solver1($fileContents);
        $this->solver->solve();
    }
}
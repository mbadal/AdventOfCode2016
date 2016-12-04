<?php namespace AdventOfCode\Solver;


use AdventOfCode\Helper\TriangleHelper;

class Solver3 extends SolverAbstract {
    public function __construct($riddleInput) {
        parent::__construct($riddleInput);
    }

    public function solve() {
        $triads = explode("\n", $this->riddleInput);

        $countOfValid = 0;
        foreach ($triads as $triad) {
            $triad      = preg_replace('/\s{2,}/', ' ', $triad);
            $triadArray = explode(' ', $triad);
            array_shift($triadArray);

            list($x, $y, $z) = $triadArray;
            if (TriangleHelper::canBeTriangle((int)$x, (int)$y, (int)$z) === true) {
                $countOfValid++;
            }
        }

        echo "Count of valid triangle sides: [{$countOfValid}]";
    }
}
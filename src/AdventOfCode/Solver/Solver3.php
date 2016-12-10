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

    public function solveB() {
        $triads = explode("\n", $this->riddleInput);

        $countOfValid = 0;
        $first        = [];
        $second       = [];
        $third        = [];
        foreach ($triads as $triad) {
            $triad = preg_replace('/\s{2,}/', ' ', $triad);

            $exploded = explode(' ', $triad);
            array_shift($exploded);
            $first[]  = $exploded[0];
            $second[] = $exploded[1];
            $third[]  = $exploded[2];
        }

        $finalArray = array_merge($first, $second, $third);
        $index = 0;
        while ($index < count($finalArray)) {
            $a = $finalArray[$index++];
            $b = $finalArray[$index++];
            $c = $finalArray[$index++];

            if (TriangleHelper::canBeTriangle((int)$a, (int)$b, (int)$c) === true) {
                $countOfValid++;
            }
        }

        echo "Count of valid triangle sides: [{$countOfValid}]";
    }
}
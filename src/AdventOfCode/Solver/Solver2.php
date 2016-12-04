<?php namespace AdventOfCode\Solver;


use AdventOfCode\Helper\CustomKeypad;
use AdventOfCode\Helper\NumericKeypad;

class Solver2 extends SolverAbstract {

    public function __construct($riddleInput) {
        parent::__construct($riddleInput);
    }


    public function solve() {
        $keypad = new NumericKeypad();
        $lines  = explode("\n", $this->riddleInput);

        $finalSequence = '';
        foreach ($lines as $counter => $line) {
            $steps = str_split($line);

            $updatedCounter = $counter + 1;
            echo "Starting resolving key number:[{$updatedCounter}]", "<br>";
            foreach ($steps as $step) {
                echo "Actual button: [{$keypad->getActualKey()}]", "<br>";
                echo "Next instruction: [{$step}]", "<br>";
                $keypad->getNextKey($step);
            }
            echo '---------------------------------------------------------', "<br>", "<br>";

            $finalSequence .= $keypad->getActualKey();
        }

        echo "Final sequence: [{$finalSequence}]";
    }

    public function solveB() {
        $keypad = new CustomKeypad();
        $lines  = explode("\n", $this->riddleInput);

        $finalSequence = '';
        foreach ($lines as $counter => $line) {
            $steps = str_split($line);

            $updatedCounter = $counter + 1;
            echo "Starting resolving key number:[{$updatedCounter}]", "<br>";
            foreach ($steps as $step) {
                echo "Actual button: [{$keypad->getActualKey()}]", "<br>";
                echo "Next instruction: [{$step}]", "<br>";
                $keypad->getNextKey($step);
            }
            echo '---------------------------------------------------------', "<br>", "<br>";

            $finalSequence .= $keypad->getActualKey();
        }

        echo "Final sequence: [{$finalSequence}]";
    }

}
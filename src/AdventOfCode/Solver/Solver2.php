<?php namespace AdventOfCode\Solver;


use AdventOfCode\Helper\Keypad;

class Solver2 extends SolverAbstract {

    private $keypad;

    public function __construct($riddleInput) {
        parent::__construct($riddleInput);

        $this->keypad = new Keypad();
    }


    public function solve() {
        $lines = explode("\n", $this->riddleInput);

        $finalSequence = '';
        foreach ($lines as $counter => $line) {
            $steps          = str_split($line);

            $updatedCounter = $counter + 1;
            echo "Starting resolving key number:[{$updatedCounter}]", "<br>";
            foreach ($steps as $step) {
                echo "Actual button: [{$this->keypad->getActualKey()}]", "<br>";
                echo "Next instruction: [{$step}]", "<br>";
                $this->keypad->getNextKey($step);
            }
            echo '---------------------------------------------------------', "<br>", "<br>";

            $finalSequence .= $this->keypad->getActualKey();
        }

        echo "Final sequence: [{$finalSequence}]";
    }

}
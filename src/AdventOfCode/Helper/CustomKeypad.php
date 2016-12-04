<?php namespace AdventOfCode\Helper;


class CustomKeypad extends KeypadAbstract {

    protected $keypad = [
        0 => [
            0,
            0,
            1,
            0,
            0,
        ],
        1 => [
            0,
            2,
            3,
            4,
            0,
        ],
        2 => [
            5,
            6,
            7,
            8,
            9
        ],
        3 => [
            0,
            'A',
            'B',
            'C',
            0,
        ],
        4 => [
            0,
            0,
            'D',
            0,
            0
        ],
    ];

    public function __construct() {
        parent::__construct();

        $this->actualRow    = 2;
        $this->actualColumn = 0;
    }

    public function getNextKey($instruction) {

        if ($instruction === self::DIRECTION_LEFT
            && ($this->actualColumn === 0 || $this->keypad[$this->actualRow][($this->actualColumn - 1)] === 0)) {
            $this->hasPositionChanged = false;

            return $this->getActualKey();
        }
        
        if ($instruction === self::DIRECTION_RIGHT
            && ($this->actualColumn === (sizeof($this->keypad[$this->actualRow]) - 1) || $this->keypad[$this->actualRow][($this->actualColumn + 1)] === 0)) {
            $this->hasPositionChanged = false;

            return $this->getActualKey();
        }

        if ($instruction === self::DIRECTION_UP && ($this->actualRow === 0 || $this->keypad[$this->actualRow - 1][$this->actualColumn] === 0)) {
            $this->hasPositionChanged = false;

            return $this->getActualKey();
        }

        if ($instruction === self::DIRECTION_DOWN && ($this->actualRow === (sizeof($this->keypad) - 1) || $this->keypad[$this->actualRow + 1][$this->actualColumn] === 0)) {
            $this->hasPositionChanged = false;

            return $this->getActualKey();
        }

        list($this->actualRow, $this->actualColumn) = $this->operationMap[$instruction]($this->actualRow, $this->actualColumn);
        $this->hasPositionChanged = true;

        return $this->getActualKey();
    }
}
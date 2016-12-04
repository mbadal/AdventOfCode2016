<?php namespace AdventOfCode\Helper;

class NumericKeypad extends KeypadAbstract {

    public function __construct() {
        parent::__construct();

        $this->actualColumn = 1;
        $this->actualRow    = 1;
    }

    public function getNextKey($instruction) {
        if ($instruction === self::DIRECTION_UP && $this->actualRow === 0) {
            $this->hasPositionChanged = false;

            return $this->getActualKey();
        }

        if ($instruction === self::DIRECTION_DOWN && $this->actualRow === (sizeof($this->keypad) - 1)) {
            $this->hasPositionChanged = false;

            return $this->getActualKey();
        }

        if ($instruction === self::DIRECTION_RIGHT && $this->actualColumn === (sizeof($this->keypad[$this->actualColumn])) - 1) {
            $this->hasPositionChanged = false;

            return $this->getActualKey();
        }

        if ($instruction === self::DIRECTION_LEFT && $this->actualColumn === 0) {
            $this->hasPositionChanged = false;

            return $this->getActualKey();
        }

        list($this->actualRow, $this->actualColumn) = $this->operationMap[$instruction]($this->actualRow, $this->actualColumn);
        $this->hasPositionChanged = true;

        return $this->getActualKey();
    }
}
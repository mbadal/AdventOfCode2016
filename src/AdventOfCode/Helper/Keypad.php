<?php namespace AdventOfCode\Helper;

class Keypad {

    const DIRECTION_LEFT  = 'L';
    const DIRECTION_RIGHT = 'R';
    const DIRECTION_UP    = 'U';
    const DIRECTION_DOWN  = 'D';

    private $operationMap = [];

    private $keypad = [
        1 => [
            1,
            2,
            3
        ],
        2 => [
            4,
            5,
            6
        ],
        3 => [
            7,
            8,
            9
        ],
    ];

    public function __construct() {
        $this->operationMap = [
            self::DIRECTION_UP    => function ($row, $column) {
                return [
                    --$row,
                    $column,
                ];
            },
            self::DIRECTION_DOWN  => function ($row, $column) {
                return [
                    ++$row,
                    $column
                ];
            },
            self::DIRECTION_LEFT  => function ($row, $column) {
                return [
                    $row,
                    --$column
                ];
            },
            self::DIRECTION_RIGHT => function ($row, $column) {
                return [
                    $row,
                    ++$column,
                ];
            },
        ];
    }

    //indexing starts at 0
    private $actualColumn       = 1;
    private $actualRow          = 2;
    private $hasPositionChanged = false;

    public function getActualKey() {
        return $this->keypad[$this->actualRow][$this->actualColumn];
    }

    public function hasPositionChanged() {
        return $this->hasPositionChanged;
    }

    public function getNextKey($instruction) {
        if ($instruction === self::DIRECTION_UP && $this->actualRow === 1) {
            $this->hasPositionChanged = false;

            return $this->getActualKey();
        }

        if ($instruction === self::DIRECTION_DOWN && $this->actualRow === 3) {
            $this->hasPositionChanged = false;

            return $this->getActualKey();
        }

        if ($instruction === self::DIRECTION_RIGHT && $this->actualColumn === 2) {
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
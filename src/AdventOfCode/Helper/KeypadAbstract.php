<?php namespace AdventOfCode\Helper;


abstract class KeypadAbstract {
    const DIRECTION_LEFT  = 'L';
    const DIRECTION_RIGHT = 'R';
    const DIRECTION_UP    = 'U';
    const DIRECTION_DOWN  = 'D';

    protected $operationMap       = [];
    protected $hasPositionChanged = false;

    protected $actualColumn;
    protected $actualRow;

    protected $keypad = [
        0 => [
            1,
            2,
            3
        ],
        1 => [
            4,
            5,
            6
        ],
        2 => [
            7,
            8,
            9
        ],
    ];

    public function __construct() {
        $this->operationMap = [
            static::DIRECTION_UP    => function ($row, $column) {
                return [
                    --$row,
                    $column,
                ];
            },
            static::DIRECTION_DOWN  => function ($row, $column) {
                return [
                    ++$row,
                    $column
                ];
            },
            static::DIRECTION_LEFT  => function ($row, $column) {
                return [
                    $row,
                    --$column
                ];
            },
            static::DIRECTION_RIGHT => function ($row, $column) {
                return [
                    $row,
                    ++$column,
                ];
            },
        ];
    }

    public function hasPositionChanged() {
        return $this->hasPositionChanged;
    }

    public function getActualKey() {
        return $this->keypad[$this->actualRow][$this->actualColumn];
    }

    public abstract function getNextKey($instruction);
}
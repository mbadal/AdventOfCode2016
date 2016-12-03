<?php namespace AdventOfCode\Solver;

class Solver {

    const DIRECTION_LEFT  = 'L';
    const DIRECTION_RIGHT = 'R';
    const DIRECTION_UP    = 'U';
    const DIRECTION_DOWN  = 'D';

    /** @var string */
    protected $riddleInput;

    public function __construct($riddleInput) {
        $this->riddleInput = $riddleInput;
    }

    public function solve1() {
        $items = explode(', ', $this->riddleInput);

        $actualDirection = null;
        $moves           = [
            self::DIRECTION_LEFT  => 0,
            self::DIRECTION_RIGHT => 0,
            self::DIRECTION_UP    => 0,
            self::DIRECTION_DOWN  => 0,
        ];
        foreach ($items as $counter => $item) {
            $temp          = self::parseDirection($item);
            $nextDirection = $temp[0];
            $stepsToGo     = $temp[1];

            if (is_null($actualDirection)) {
                $actualDirection = $nextDirection === self::DIRECTION_LEFT ? self::DIRECTION_LEFT : self::DIRECTION_RIGHT;
            } else {
                if ($actualDirection === self::DIRECTION_LEFT) {
                    $actualDirection = $nextDirection === self::DIRECTION_LEFT ? self::DIRECTION_DOWN : self::DIRECTION_UP;
                } elseif ($actualDirection === self::DIRECTION_RIGHT) {
                    $actualDirection = $nextDirection === self::DIRECTION_LEFT ? self::DIRECTION_UP : self::DIRECTION_DOWN;
                } elseif ($actualDirection === self::DIRECTION_UP) {
                    $actualDirection = $nextDirection === self::DIRECTION_LEFT ? self::DIRECTION_LEFT : self::DIRECTION_RIGHT;
                } elseif ($actualDirection === self::DIRECTION_DOWN) {
                    $actualDirection = $nextDirection === self::DIRECTION_LEFT ? self::DIRECTION_RIGHT : self::DIRECTION_LEFT;
                }

            }

            $moves[$actualDirection] += $stepsToGo;
            echo "Next movement: [{$item}]", "<br>";
            echo "Direction: [{$actualDirection}]", "<br>";
            echo '----------------------------------------', "<br>", "<br>";
        }

        var_dump($moves);
        $finalPosition = self::calculateFinalPosition($moves);
        var_dump($finalPosition);

        var_dump($finalPosition['x'] + $finalPosition['y']);
    }

    private static function parseDirection($input) {
        return [
            substr($input, 0, 1),
            substr($input, 1),
        ];
    }

    private static function calculateFinalPosition(array $moves) {
        $result = [
            'x' => 0,
            'y' => 0,
        ];

        $result['x'] = abs(($moves[self::DIRECTION_LEFT] - $moves[self::DIRECTION_RIGHT]));
        $result['y'] = abs(($moves[self::DIRECTION_UP] - $moves[self::DIRECTION_DOWN]));

        return $result;
    }
}
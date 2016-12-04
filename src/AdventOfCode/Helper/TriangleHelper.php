<?php namespace AdventOfCode\Helper;


class TriangleHelper {
    public static function canBeTriangle($x, $y, $z) {
        if ($x + $y > $z && $x + $z > $y && $y + $z > $x) {
            return true;
        }

        return false;
    }

}
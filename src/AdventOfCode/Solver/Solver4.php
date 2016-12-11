<?php namespace AdventOfCode\Solver;


class Solver4 extends SolverAbstract {

    private $histogram = [];

    public function solve() {
        $codes = explode("\n", $this->riddleInput);
        /*$codes = [
            'aaaaa-bbb-z-y-x-123[abxyz]',
            'a-b-c-d-e-f-g-h-987[abcde]',
            'not-a-real-room-404[oarel]',
            'totally-real-room-200[decoy]',
        ];*/

        $sum = 0;
        foreach ($codes as $code) {
            list($code, $hash) = explode('[', $code);
            var_dump($code);
            $hash = str_replace(']', '', $hash);
            var_dump($hash);
            $histogram = self::createHistogram($code);
            $histogram = self::sortHistogram($histogram);

            $hashCharacters = str_split($hash);
            var_dump($histogram);
            /*foreach ($histogram as $key => $number) {
                if ($index === sizeof($hashCharacters)) {
                    var_dump("Code: [{$code}] is valid");
                    $countOfValid++;
                    break;
                }

                if ($hashCharacters[$index++] !== $key) {
                    break;
                }
            }*/
            $index = 0;
            foreach ($hashCharacters as $character) {
                if (isset($histogram[$character])) {
                    $index++;
                }
            }


            if ($index === sizeof($hashCharacters)) {
                //$countOfValid++;
                $pos = strrpos($code, '-');
                $sectorId = (int)substr($code, ($pos + 1));
                $sum += $sectorId;
            }
        }
        var_dump("Sum of valid sector IDs: [{$sum}]");
        exit;
    }

    private static function createHistogram($string): array {
        $characters = str_split($string);

        $histogram = [];
        foreach ($characters as $character) {
            if ($character >= 'a' && $character <= 'z') {
                if (!isset($histogram[$character])) {
                    $histogram[$character] = 0;
                }
                $histogram[$character]++;
            }
        }

        return $histogram;
    }

    private static final function sortHistogram(array $histogram): array {
        arsort($histogram, SORT_NUMERIC);
        //var_dump($histogram);

        $keys    = array_keys($histogram);
        $keySize = sizeof($keys);

        $sortedKeys = [];
        $lastValue  = null;
        $i          = 0;
        while ($i < $keySize) {

            $key   = $keys[$i];
            $value = $histogram[$key];

            if ($i === $keySize - 1) {
                $sortedKeys[] = $key;
                break;
            }

            $sameValuesCount = 0;
            $nextValue       = $value;
            $valueStartIndex = $i;
            while (($i + $sameValuesCount) <= $keySize - 1 && $value === $nextValue) {
                $sameValuesCount++;
                if ($i + $sameValuesCount === $keySize) {
                    //var_dump("Same value count: {$sameValuesCount} for value: {$value}, started at index: [{$valueStartIndex}]");
                    break;
                }

                $nextKey   = $keys[$i + $sameValuesCount];
                $nextValue = $histogram[$nextKey];
                //var_dump("Same value count: {$sameValuesCount} for value: {$value}, started at index: [{$valueStartIndex}]");
            }

            if ($sameValuesCount === 1) {
                $i++;

                $sortedKeys[] = $key;
                continue;
            }

            $i += $sameValuesCount;
            $slice       = array_slice($keys, $valueStartIndex, $sameValuesCount);
            $sortedSlice = self::sortAlphabetically($slice);
            $sortedKeys  = array_merge($sortedKeys, $sortedSlice);
        }


        $sortedHistogram = [];
        foreach ($sortedKeys as $key) {
            $sortedHistogram[$key] = $histogram[$key];
            if (sizeof($sortedHistogram) === 5) {
                break;
            }
        }

        return $sortedHistogram;
    }

    private static final function sortAlphabetically(array $array) {
        asort($array, SORT_STRING);

        return $array;
    }
}
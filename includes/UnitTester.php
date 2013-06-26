<?php

class UnitTester
{
    public static function runUnitTests($algorithm, $min = 1, $max = 100, $tests = 10)
    {
        $success = 0;
        for ($i = 0; $i < $tests; $i ++ ) {

            $arraySampleSize = round(($max - $min) * ($i / ($tests - 1)) + $min);

            $arr = range(1, $arraySampleSize);
            shuffle($arr);

            $executed = static::runUnitTest($algorithm, $arr);

            if ($executed) {
                $success++;
            }
        }
        $failed = $tests - $success;

        echo "<b>{$success}</b> tests were successfully. <b>{$failed} tests failed.</b>";
    }

    public static function runUnitTest($algorithm, $array)
    {
        $sorter = new $algorithm($array);
        $initialArray = $array;

        if (!($sorter instanceof SorterAbstract)) {
            throw new Exception('Unit test failed');
        }

        sort($array);

        if ($sorter->sort() === $array) {
            return true;
        }
        echo '<br>Initial array:';
        var_dump($initialArray);
        echo '<br>Tested sorter (that failed):';
        var_dump($sorter->getArray());
        echo '<br>How it should look like:';
        var_dump($array);
        die;
        return false;
    }
}
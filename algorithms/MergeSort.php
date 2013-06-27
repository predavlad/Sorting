<?php
/**
 * !!! NOT FINISHED YET !!!
 * Class MergeSort
 *
 * Worst case performance:      O(n log n)
 * Best case performance:       O(n log n)
 * Average case performance:    O(n log n))
 * Worst case space complexity: O(n)
 */
class MergeSort
    extends SorterAbstract
{
    public function __construct($array)
    {
        parent::__construct($array);
    }

    public function sort($arr = null)
    {
        $left = $right = array();


        // first time being called
        if (is_null($arr)) {
            $arr = $this->array;
        }

        if (count($arr) <= 1) {
            return $arr;
        }

        $mid = floor(count($arr) / 2);
        $direction = 0;
        foreach ($arr as $elem) {
            if ($direction == 0) {
                $left[] = $elem;
                $direction = 1;
            } else {
                $right[] = $elem;
                $direction = 0;
            }
        }

        $left = $this->sort($left);
        $right = $this->sort($right);

        return $this->merge($left, $right);
    }

    public function merge($left, $right)
    {
        $result = array();

        while (count($left) || count($right)) {
            if (count($left) && count($right)) {
                $leftElem = reset($left);
                $rightElem = reset($right);
                if ($leftElem < $rightElem) {
                    $result[] = array_shift($left);
                } else {
                    $result[] = array_shift($right);
                }
            } elseif (count($left)) {
                $result = array_merge($result, $left);
            } else {
                $result = array_merge($result, $right);
            }
        }

        return $result;
    }

}

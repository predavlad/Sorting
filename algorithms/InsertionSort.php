<?php
/**
 * Class InsertionSort
 *
 * Worst case performance:      O(n^2)
 * Best case performance:       O(n)
 * Average case performance:    O(n^2)
 * Worst case space complexity: O(n)
 */
class InsertionSort
    extends SorterAbstract
{
    public function __construct($array)
    {
        parent::__construct($array);
    }

    public function sort()
    {
        for ($i = 1; $i < $this->length; $i ++):

            $currentElement = $this->array[$i];
            $currentPos     = $i;

            if ($currentElement >= $this->array[$currentPos - 1]) {
                continue;
            }

            while ($currentElement < $this->array[$currentPos - 1]) {
                $this->array[$currentPos] = $this->array[$currentPos - 1];
                $currentPos --;
            }

            $this->array[$currentPos] = $currentElement;

        endfor;

        return $this->array;
    }
}
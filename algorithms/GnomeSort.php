<?php
/**
 * Class GnomeSort
 *
 * Worst case performance:      O(n^2)
 * Best case performance:       O(n)
 * Average case performance:    O(n^2)
 * Worst case space complexity: O(1)
 */
class GnomeSort
    extends SorterAbstract
{
    public function __construct($array)
    {
        parent::__construct($array);
    }

    public function sort()
    {
        $position = 1; // start from second position

        while ($position < $this->length):

            $descend = false;

            if ($this->array[$position - 1] > $this->array[$position]):

                $temp = $this->array[$position];
                $this->array[$position] = $this->array[$position - 1];
                $this->array[$position - 1] = $temp;

                if ($position != 1) {
                    $position --;
                    $descend = true;
                } else {
                    $descend = false;
                }

            endif;

            if (!$descend) {
                $position ++;
            }

        endwhile;

        return $this->array;
    }
}
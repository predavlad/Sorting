<?php
/**
 * Class BubbleSort
 *
 * Worst case performance:      O(n^2)
 * Best case performance:       O(n)
 * Average case performance:    O(n^2)
 * Worst case space complexity: O(1)
 */
class BubbleSort
    extends SorterAbstract
{
    public function __construct($array)
    {
        parent::__construct($array);
    }

    /**
     * Bubble sort
     * @return array
     */
    public function sort()
    {
        $sorted = false;
        while (!$sorted):

            $sorted = true;
            for ($i = 0; $i < $this->length - 1; $i ++):

                if ($this->array[$i] > $this->array[$i + 1]):

                    $this->array[$i]    += $this->array[$i + 1];
                    $this->array[$i + 1] = $this->array[$i] - $this->array[$i + 1];
                    $this->array[$i]    -= $this->array[$i + 1];

                    $sorted = false;

                endif;

            endfor;

        endwhile;

        return $this->array;
    }

}
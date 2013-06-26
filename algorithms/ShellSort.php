<?php
/**
 * Class ShellSort
 *
 * Worst case performance:      O(n^(3/2))
 * Best case performance:       O(n)
 * Average case performance:    O(n^(3/2))
 * Worst case space complexity: O(1)
 */
class ShellSort
    extends SorterAbstract
{
    public function __construct($array)
    {
        parent::__construct($array);
    }

    public function sort()
    {
        $gaps = $this->getGaps();

        foreach ($gaps as $gap):

            for ($i = $gap; $i < $this->length; $i ++):

                $temp = $this->array[$i];

                for ($j = $i; $j >= $gap && $this->array[$j - $gap] > $temp; $j -= $gap):

                    $this->array[$j] = $this->array[$j - $gap];

                endfor;

                $this->array[$j] = $temp;

            endfor;

        endforeach;

        return $this->array;
    }

    /**
     * Using the gap sequence suggested by Ciura
     */
    public function getGaps()
    {
        $gaps = array(701, 301, 132, 57, 23, 10, 4, 1);
        while ($gaps[0] > $this->length) {
            array_shift($gaps);
        }
        return $gaps;
    }
}
<?php

class PhpDefaultSort
    extends SorterAbstract
{
    public function __construct($array)
    {
        parent::__construct($array);
    }

    public function sort()
    {
        sort($this->array);
    }
}
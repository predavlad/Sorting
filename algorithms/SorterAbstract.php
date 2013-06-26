<?php

abstract class SorterAbstract
{
    protected $array = array();
    protected $length = 0;

    public function __construct($array = array())
    {
        $this->array = $array;
        $this->length = count($array);
    }

    public function getArray()
    {
        return $this->array;
    }

    abstract public function sort();
}
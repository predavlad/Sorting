<?php

class AlgorithmTester
{
    protected $algorithms = array();
    protected $array      = array();
    protected $iterations = 1;

    protected $startTime = null;
    protected $endTime   = null;

    public static $existingAlgorithms = array(
        'BubbleSort',
        'PhpDefaultSort'
    );

    public function __construct($algorithms = array(), $arrayLength = 50, $iterations = 1)
    {
        //$this->algorithms = array_intersect($algorithms, static::$existingAlgorithms);
        $this->algorithms = $algorithms;
        $this->iterations = $iterations;

        $this->generateArray($arrayLength);
    }

    public function generateArray($size)
    {
        $this->array = range(1, $size);
        shuffle($this->array);
    }

    public function setIterations($iterations)
    {
        $this->iterations = $iterations;
    }

    public function run()
    {
        foreach ($this->algorithms as $algorithm) {
            $this->runAlgorithm($algorithm);
        }
    }

    protected function runAlgorithm($algorithm)
    {
        $totalTime = 0;

        for ($i = 0; $i < $this->iterations; $i ++) {
            $sorter = new $algorithm($this->array);

            if (!($sorter instanceof SorterAbstract)) {
                throw new Exception("Sorter {$algorithm} is not an instance of SorterAbstract");
            }

            $this->startTimer();
            $sorter->sort();
            $this->endTimer();

            $totalTime += $this->calculateTime();
        }

        $this->displayTestResult($algorithm, $totalTime);
    }

    protected function displayTestResult($algorithm, $totalTime)
    {
        $avg = round($totalTime / $this->iterations, 4);
        $len = count($this->array);

        echo <<<EOD
<br> Testing algorithm <b>{$algorithm}</b>, doing <b>{$this->iterations}</b> iteration(s) on an array with length <b>{$len}</b><br>
Total time: <b>{$totalTime}</b>. Time per iteration: <b>{$avg}</b> <br>

EOD;

    }

    /**
     * TIMER FUNCTIONS
     */
    public function getTime()
    {
        $mTime = microtime();
        $mTime = explode(" ", $mTime);
        return $mTime[1] + $mTime[0];
    }

    public function startTimer()
    {
        $this->startTime = $this->getTime();
    }

    public function endTimer()
    {
        $this->endTime = $this->getTime();
    }

    public function calculateTime()
    {
        return round($this->endTime - $this->startTime, 4);
    }

}
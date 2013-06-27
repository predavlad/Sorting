<?php
/**
 * These is something I did in my spare time to remember the sorting alhorithms out there
 * The default PHP sort (that uses quicksort behind the scenes) is much faster than anything
 * you can write in pure PHP. Even with optimizations and opcode cache (which I didn't do / take
 * into consideration), these scrips are orders of magnitude slower than PHP sort() - which is used
 * in PhpDefaultSort class.
 */ 
include "includes/autoload.php";
include "includes/app.php";
include "includes/UnitTester.php";

$algorithms = array(
    'MergeSort',
    'ShellSort',
    'InsertionSort',
    'GnomeSort',
    'BubbleSort',
    'PhpDefaultSort'
);

UnitTester::runUnitTests('MergeSort');

$algorithmTester = new AlgorithmTester($algorithms, 100, 2);
$algorithmTester->run();

echo '<br>';
echo '========================';
echo '<br>Script ended';

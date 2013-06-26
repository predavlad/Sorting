<?php

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
echo '<br><br>Script ended';

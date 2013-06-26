<?php

function algorithm_autoloader($className) {
    include "algorithms/$className.php";
}

spl_autoload_register('algorithm_autoloader');


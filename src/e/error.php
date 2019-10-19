<?php
/**
 *
 */

$var = 1;
$a = 0;

try {
    $var->method(); // Throws an Error object in PHP 7.
} catch (Error $e) {
    //print $e->getMessage() . PHP_EOL;
}

function add(int $left, int $right)
{
    return $left + $right;
}

try {
    $value = add('left', 'right');
} catch (TypeError $e) {
    //print $e->getMessage() . PHP_EOL;
}

try {
    eval('echo $a');
} catch (ParseError $e) {
    //print $e->getMessage().PHP_EOL;
}

try {
    $value = 1 % 0;
} catch (DivisionByZeroError $e) {
    //print $e->getMessage() . PHP_EOL;
}
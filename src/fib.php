<?php

/**
 * 递归方式.
 *
 * @param number $n
 *
 * @return number
 */
function fib1($n)
{
    if ($n == 0) {
        return 0;
    }
    if ($n == 1) {
        return 1;
    }
    
    return fib1($n - 1) + fib1($n - 2);
}

/**
 * 循环方式.
 *
 * @param number $n            
 *
 * @return number
 */
function fib2($n)
{
    $x = 0;
    $y = 1;
    for ($i = 1; $i < $n; ++ $i) {
        $y = $x + $y;
        $x = $y - $x;
    }
    
    return $y;
}

print fib1(30) . PHP_EOL;
print fib2(30) . PHP_EOL;

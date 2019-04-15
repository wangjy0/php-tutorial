<?php
/**
 *
 */

function a(int $a)
{
    echo $a;
}

try {
    //a('ddd');
    $a = 10/0;
} catch (Error $e) {
    print $e->getMessage();
}
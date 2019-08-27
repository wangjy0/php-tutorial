<?php
//$a = file_get_contents('1.jpg');
//$a = 'string';
//$a = 10;
//$a = new stdClass();
//$a = [1,2,3,4,5];
//$b = $a;

//xdebug_debug_zval('a');

//php -dzend.enable_gc=0 -dmemory_limit=-1 -n gc.php

class Foo
{
    public $var = '3.1415962654';
}

for ( $i = 0; $i <= 20000; $i++ )
{
    $a = new Foo;
    $a->self = $a;
}

echo memory_get_peak_usage(), "\n";
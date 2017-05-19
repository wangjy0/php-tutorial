<?php

function foo(&$var)
{
    $var ++;
}

$a = 5;
var_dump($a);
foo($a);
var_dump($a);

function &bar()
{
    $a = 5;
    return $a;
}
$a = bar();
var_dump($a);
foo($a);
var_dump($a);

$a = 1;
$b =& $a;
var_dump($b);
unset($a);
var_dump($b);

class foo {
    public $value = 42;

    public function &getValue() {
        return $this->value;
    }
}

$obj = new foo;
$myValue = &$obj->getValue(); // $myValue is a reference to $obj->value, which is 42.
$obj->value = 2;
var_dump($myValue);
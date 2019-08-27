<?php
$a = 10;

function chage1($b){
    $b = 2*10;
}

chage1($a);

var_dump($a);

$a = new stdClass();
$a->var1 = 10;

function chage2($b){
    $b = new stdClass();
    $b->var1 = 20;
}

chage2($a);

var_dump($a);

function chage3($a){
    $a->var1 = 30;
}

chage3($a);
var_dump($a);

$a = ['a','b','c'];

function chage4($b){
     //$a = array_reverse($a);
     foreach ($b as $k => $v){
         $b[$k] = '--' . $v;
     }
}

chage4($a);

var_dump($a);


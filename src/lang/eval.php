<?php
$a = 10;
$b = 20;
// eval('$sum = $a+$b;')
// print_r($sum);
$var = eval('$sum = $a+$b; return $sum;');
print_r($var);

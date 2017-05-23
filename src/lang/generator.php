<?php
function gen_rand($n){
    for ($i = 0; $i < $n; $i++) {
        yield $i;
    }
}

$arr1 = gen_rand(100);

var_dump(iterator_to_array($arr1));
/*
 foreach ($arr1 as $item){
 var_dump($item);
 }
 */
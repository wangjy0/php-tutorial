<?php
/*
$range = range ( 'a', 'z' );

shuffle ( $range );

$fruit = array (
        'a' => 'apple',
        'b' => 'banana',
        'c' => 'cranberry' 
);
while ( $v = each ( $fruit ) ) {
    print_r ( $v );
}
print '<br>';
reset ( $fruit );
while ( list ( $key, $val ) = each ( $fruit ) ) {
    echo "$key => $val\n";
}
print '<br>';

extract ( $fruit );

print_r ( $a );
print '<br>';
print_r ( $b );
print '<br>';
print_r ( $c );
print '<br>';

print_r ( compact ( 'a', 'b', 'c' ) );
print '<br>';

$a = array (
        1,
        2,
        3,
        4 
);

array_walk ( $a, function (&$value, $key, $prefix) {
    $value = $prefix . $value;
}, 'aaa' );

var_dump ( $a );
*/
/*
$arr = array(
        'name' => 'corn',
        'age' => '24',
);
test_arr($arr);
function test_arr($arr){
    $arr['name'] = 'qqyumidi';
}
print_r($arr); //result: Array ( [name] => corn [age] => 24 )
*/

$arr = ['a', 'b', 'c'];

list($k1, $k2, $k3) = $arr;

var_dump($k1, $k2, $k3);

$arr = ['k1' => 'a', 'k2' => 'b', 'k3' => 'c'];

//list($a, $b, $c ) = $arr;
extract($arr);
var_dump($k1, $k2, $k3);

$arr1 = compact('k1', 'k2', 'k3');
var_dump($arr1);

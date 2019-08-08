<?php
$arr1 = [
    [1, 2, 3],
    [4, 5, 6],
];
$arr2 = [
    [1, 2,1,1],
    [3, 4,1,1],
    [5, 6,1,1],
];
$arr3 = [
    [22,28,6,6],
    [49,64,15,15]
];
function matrix_product($arr1, $arr2)
{
    $c1 = count($arr1);
    $c2 = count($arr2[0]);
    $c3 = count($arr2);
    $p = [];
    for ($i = 0; $i < $c1; $i++) {
        for ($j = 0; $j < $c2; $j++) {
            for ($k = 0; $k < $c3; $k++) {
                $p[$i][$j] += $arr1[$i][$k] * $arr2[$k][$j];
            }
        }
    }

    var_export($p);
}

matrix_product($arr1, $arr2);
<?php
$array = [1, 2, 3, 4, 5];
foreach ($array as &$v1) {
    foreach ($array as &$v2) {
        if ($v1 == 1 && $v2 == 1) {
            unset($array[0]);
        }
        echo "($v1, $v2)\n";
    }
}
exit();
$array = [1, 2, 3, 4, 5];
foreach ($array as &$val) {
    var_dump($val);
    $array[2] = 0;
}

$obj = new stdClass;
$obj->foo = 1;
$obj->bar = 2;
foreach ($obj as $val) {
    var_dump($val);
    $obj->bar = 42;
}
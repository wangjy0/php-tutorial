<?php
$room = [
    'RoomName'=>'客餐厅',
    'GroundArea'=>80.78
];

$code = 'return 2*$room[\'GroundArea\'];';
$func = create_function('$room', $code);

$result = $func($room);
print_r($result);
<?php
$room = [
    'RoomName'=>'客餐厅',
    'GroundArea'=>80.78,
    ''
];
$args = '$room';
$code = <<<'EOD'
$qty = 0;
$qty = 2*$room['GroundArea'];
return $qty;
EOD;
$func = create_function($args, $code);

$result = $func($room);
print_r($result);
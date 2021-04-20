<?php
$timeTarget = 50; // 50 毫秒（milliseconds）

$cost = 8;
do {
    $cost++;
    $start = microtime(true)*1000;
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true)*1000;
} while (($end - $start) < $timeTarget);

echo "Appropriate Cost Found: " . $cost . "\n";
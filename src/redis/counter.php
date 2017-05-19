<?php

$redis = new Redis();
$redis->pconnect('127.0.0.1', 6379);

$key = 'sn';

if ($redis->get($key)) {
    $count = $redis->incr($key);
} else {
    $count = $redis->incr($key);
    $expire = strtotime(date('Y-m-d 23:59:59'));
    $redis->expireAt($key, $expire);
}
$redis->close();
echo $count;

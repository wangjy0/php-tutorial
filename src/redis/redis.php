<?php

$redis = new Redis();

try {
    $redis->connect('127.0.0.1', 6379);

    for ($i=1;$i<=10000; $i++){
        $redis->set('name:'.$i, $i, 3600);
    }
} catch (RedisException $e) {
    var_dump($e->getMessage());
}

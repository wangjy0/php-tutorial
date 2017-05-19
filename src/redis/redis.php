<?php

$redis = new Redis();

try {
    $redis->connect('127.0.0.1', 6379);

    $name = $redis->get('name');
    var_dump($name);
} catch (RedisException $e) {
    var_dump($e->getMessage());
}

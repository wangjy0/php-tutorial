<?php
/**
 *
 */
require_once '../../vendor/autoload.php';

$client = new Redis();
$client->connect('localhost', 6379);
$pool = new Cache\Adapter\Redis\RedisCachePool($client);
$config = ['ttl'=>3600, 'prefix'=>'sess_'];
$sessionHandler = new Cache\SessionHandler\Psr6SessionHandler($pool, $config);

session_set_save_handler($sessionHandler,true);

session_start();
$count = $_SESSION['count'] ?? 0;
$count++;
$_SESSION['count'] = $count  ;

var_dump($_SESSION);
<?php
/**
 *
 */

require_once '../../vendor/autoload.php';

$client = new Memcache();
$client->connect('localhost', 11211);
$pool = new Cache\Adapter\Memcache\MemcacheCachePool($client);
$config = ['ttl'=>3600, 'prefix'=>'sess_'];
$sessionHandler = new Cache\SessionHandler\Psr6SessionHandler($pool, $config);

session_set_save_handler($sessionHandler,true);

session_start();
$count = $_SESSION['count'] ?? 0;
$count++;
$_SESSION['count'] = $count  ;

var_dump($_SESSION);
<?php
require_once "../../vendor/autoload.php";



$url='http://localhost:8000/src/rpc/json_rpc_server.php';

$client = new JsonRpc\Client($url);
$result = $client->call('hello', array('rpc'));

var_dump($client->result);
<?php

$data = ['dfdf'=>'12123','idf'=>'dsfdfd'];
$msg = msgpack_pack($data);
var_dump($msg);
$data = msgpack_unpack($msg);
var_dump($data);

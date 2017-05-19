<?php

print_r(hash_algos());
$data = 'wangjinyu';
echo hash('md5', $data).PHP_EOL;
echo md5($data).PHP_EOL;

echo hash('sha1', $data).PHP_EOL;
echo sha1($data).PHP_EOL;

echo hash('sha256', $data).PHP_EOL;

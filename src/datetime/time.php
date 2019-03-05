<?php

echo time().PHP_EOL;

echo microtime(true).PHP_EOL;

echo date('Y-m-d H:i:s').PHP_EOL;

$date = date('Y-m-d H:i:00', strtotime('+1 minute'));

echo $date.PHP_EOL;

$timestamp = strtotime($date);

echo $timestamp;

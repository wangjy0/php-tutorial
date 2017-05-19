<?php

echo time().'<br>';

echo microtime(true).'<br>';

echo date('Y-m-d H:i:s').'<br>';

$date = date('Y-m-d H:i:00', strtotime('+1 minute'));

echo $date.'<br>';

$timestamp = strtotime($date);

echo $timestamp;

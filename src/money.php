<?php

require_once 'MoneyConvertor.php';

$convertor = new MoneyConvertor();

$c = $convertor->convert('1831952.02');

header('Content-Type: text/html; charset=utf-8');
echo $c;

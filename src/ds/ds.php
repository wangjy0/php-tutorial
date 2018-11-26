<?php
/**
 *
 */
$vector = new \Ds\Vector();

$vector->push('a');
$vector->push('b', 'c');

$vector[] = 'd';
print '<pre>';
print_r($vector);
print '</pre>';

$map = new \Ds\Map();

$map->put('a', 1);
$map->put('b', 2);

$map['c'] = 3;

print '<pre>';
print_r($map);
print '</pre>';
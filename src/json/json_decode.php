<?php
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

print_r(json_decode($json));
print_r(json_decode($json, true));
<?php

error_reporting(0);
set_time_limit(0);
$conn = array();
for ($i = 0; $i < 1000; ++$i) {
    $conn[$i] = mysql_connect('localhost:3306', 'root', '123456', true);
    mysql_select_db('test');
    mysql_query('select version()', $conn[$i]);
    //usleep(500);
    //sleep(1);
    //mysql_close($conn[$i]);
}

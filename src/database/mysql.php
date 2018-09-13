<?php
set_time_limit(0);

for ($i = 0; $i < 10; ++$i) {
    $mysql = new mysqli('localhost', 'root', '123456','test',3306);

    $result = $mysql->query('select version()');
    var_dump($result->fetch_assoc());
    //usleep(500);
    //sleep(1);
    $mysql->close();
}

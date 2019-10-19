<?php
require_once "../../vendor/autoload.php";


class Test
{
    public function hello($name)
    {
        return "hello {$name}";
    }
}


$server = new JsonRpc\Server(new Test());
$server->receive();
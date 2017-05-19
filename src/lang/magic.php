<?php

class c
{

    public function m1()
    {
        echo __METHOD__;
    }

    public function m2()
    {
        echo __FUNCTION__;
    }
}

$c = new C();

$c->m1();
$c->m2();

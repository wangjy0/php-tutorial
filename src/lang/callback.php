<?php

namespace Foobar;

class Foo
{
    public static function test1()
    {
        echo "Hello test1!\n";
    }

    public function test2()
    {
        echo "Hello test2!\n";
    }
}

call_user_func(__NAMESPACE__.'\Foo::test1'); // As of PHP 5.3.0
call_user_func(array(__NAMESPACE__.'\Foo', 'test1')); // As of PHP 5.3.0

$myobject = new Foo();

call_user_func(array($myobject, 'test2'));

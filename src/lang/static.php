<?php
//static 关键字相关

class Foo
{
    public static function printItem($string)
    {
        echo 'Foo: '.$string.PHP_EOL;
    }

    public function printPHP()
    {
        echo 'PHP is great.'.__CLASS__.PHP_EOL;
        echo 'PHP is great.'.get_class().PHP_EOL;
        echo 'PHP is great.'.get_class($this).PHP_EOL;
    }

    public function run1($string)
    {
        static::printItem($string);
    }

    public static function run2($string)
    {
        static::printItem($string);
    }
}

class Bar extends Foo
{
    public static function printItem($string)
    {
        echo 'Bar: '.$string.PHP_EOL;
    }
}

Foo::run2('baz');
Bar::run2('baz');
/*
class A
{

    private function foo()
    {
        echo "success!\n";
    }

    public function test()
    {
        // $this->foo();
        static::foo();
    }
}

class B extends A
{
    // foo() will be copied to B, hence its scope will still be A and the call be successful
}

class C extends A
{

    private function foo()
    {
        // original method is replaced; the scope of the new one is C
    }
}

 // $b = new B();
 // $b->test();
 // $c = new C();
 // $c->test();   //fails
 */

class A
{
    public static function getInstance()
    {
        return new static();
    }
}

class B extends A
{
}

echo get_class(A::getInstance()).PHP_EOL;
echo get_class(B::getInstance()).PHP_EOL;

<?php
// Property
class MyClass
{
    public $var1 = 'value1';

    protected $var2 = 'value2';

    private $var3 = 'value3';

    public function __construct()
    {
        // $this->setProperty('Public', 'Protected', 'Private');
    }

    public function getProperty()
    {
        echo $this->var1.PHP_EOL;
        echo $this->var2.PHP_EOL;
        echo $this->var3.PHP_EOL;
    }

    public function setProperty($public, $protected, $private)
    {
        $this->var1 = $public;
        $this->var2 = $protected;
        $this->var3 = $private;
    }
}

$obj = new MyClass();
var_dump($obj);
// echo $obj->var1; // Works
// echo $obj->var2; // Fatal Error
// echo $obj->var3; // Fatal Error
$obj->getProperty(); // Shows Public, Protected and Private
$obj->setProperty('Public1', 'Protected1', 'Private1');
var_dump($obj);
$obj->getProperty();

class MyClass2 extends MyClass
{
}

$obj2 = new MyClass2();
var_dump($obj2);
// echo $obj2->var1; // Works
// echo $obj2->var2; // Fatal Error
// echo $obj2->var3; // Undefined
$obj2->getProperty(); // Shows Public, Protected2, Undefined
$obj2->setProperty('Public2', 'Protected2', 'Private2');
var_dump($obj2);
$obj2->getProperty();

//Method
/*
class MyClass
{
    // Declare a public constructor
    public function __construct() { }

    // Declare a public method
    public function MyPublic() { 
        echo 'public' . PHP_EOL;
    }

    // Declare a protected method
    protected function MyProtected() { 
        echo 'protected' . PHP_EOL;
    }
    // Declare a private method
    private function MyPrivate() {
        echo 'private' . PHP_EOL;
    }
    // This is public
    public function Foo()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate();
    }
}

$myclass = new MyClass;
$myclass->MyPublic(); // Works
$myclass->MyProtected(); // Fatal Error
$myclass->MyPrivate(); // Fatal Error
$myclass->Foo(); // Public, Protected and Private work


class MyClass2 extends MyClass
{
    // This is public
    public function Foo2()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate(); // Fatal Error
    }
}

$myclass2 = new MyClass2;
$myclass2->MyPublic(); // Works
$myclass2->Foo();
$myclass2->Foo2(); // Public and Protected work, not Private
*/
/*
class Test1
{
    private $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    private function bar()
    {
        echo 'Accessed the private method.';
    }

    public function baz($other)
    {
        // We can change the private property:
        $other->foo = 'hello';
        var_dump($other->foo);

        // We can also call the private method:
        $other->bar();
    }
}
class Test2
{
    private $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    private function bar()
    {
        echo 'Accessed the private method.';
    }

    public function baz($other)
    {
        // We can change the private property:
        $other->foo = 'hello';
        var_dump($other->foo);

        // We can also call the private method:
        $other->bar();
    }
}

$test = new Test1('test');

$test->baz(new Test1('other'));//OK
$test->baz(new Test2('other'));//Fatal Error
*/

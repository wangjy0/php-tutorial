<?php
 
$array = range(1, 100);

// $b = new ArrayIterator($array);
// $b->append('china');
// $c = $b->getArrayCopy();
// var_dump($b);
// var_dump($c);
$array = [
    0 => 'a',
    1 => array(
        'subA',
        'subB',
        array(
            0 => 'subsubA',
            1 => 'subsubB',
            2 => array(
                0 => 'deepA',
                1 => 'deepB'
            )
        )
    ),
    2 => 'b',
    3 => array(
        'subA',
        'subB',
        'subC'
    ),
    4 => 'c'
];

$dir = dirname(dirname(__DIR__));
// foreach (new RecursiveIteratorIterator(new RecursiveArrayIterator($array)) as $item){
//     var_dump($item);
// }

// foreach (new InfiniteIterator(new ArrayIterator($array)) as $value) {
//     print($value . PHP_EOL);
// }

// foreach (new LimitIterator(new ArrayIterator($array), 20, 10) as $value) {
//     print($value . PHP_EOL);
// }

// foreach (new DirectoryIterator(__DIR__) as $item) {
//     var_dump($item);
// }

// foreach (new FilesystemIterator(__DIR__) as $item) {
//     var_dump($item);
// }

// foreach (new DirectoryIterator(dirname(__DIR__)) as $item) {
//     print $item->getPathname() . PHP_EOL;
// }

// foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(dirname(__DIR__))) as $item) {
//     print $item->getPathname() . PHP_EOL;
// }
class FileTypeFilterIterator1 extends RecursiveFilterIterator
{

    public $FILTERS;

    public function __construct(RecursiveIterator $iterator, $ext)
    {
        $this->FILTERS = $ext;
        parent::__construct($iterator);
    }

    public function accept()
    {
        return  $this->hasChildren() || in_array(strtolower(pathinfo($this->current()->getFilename(), PATHINFO_EXTENSION)), $this->FILTERS);
    }
    
    public function getChildren() {
        return new self($this->getInnerIterator()->getChildren(), $this->FILTERS);
    }
}
$ir = new RecursiveDirectoryIterator($dir);
$ir = new FileTypeFilterIterator1($ir , ['json']);
$ir = new RecursiveIteratorIterator($ir);
foreach ($ir as $item){
   print $item->getPathname() . PHP_EOL;
}
class FileTypeFilterIterator2 extends FilterIterator
{

    public $FILTERS;

    public function __construct(Iterator $iterator, $ext)
    {
        $this->FILTERS = $ext;
        parent::__construct($iterator);
    }

    public function accept()
    {
        return in_array(strtolower(pathinfo($this->current()->getFilename(), PATHINFO_EXTENSION)), $this->FILTERS);
    }
}
$ir = new RecursiveDirectoryIterator($dir);
$ir = new RecursiveIteratorIterator($ir);
$ir = new FileTypeFilterIterator2($ir , ['json']);
foreach ($ir as $item){
   print $item->getPathname() . PHP_EOL;
}

$ir = new RecursiveDirectoryIterator($dir);
$ir = new ParentIterator($ir);
$ir = new RecursiveIteratorIterator($ir, RecursiveIteratorIterator::CHILD_FIRST);
foreach ($ir as $v){
    print ($v->getPathname()) . PHP_EOL;
}
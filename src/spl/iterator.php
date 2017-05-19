<?php
$array = range(1, 100);

$b = new ArrayIterator($array);
$b->append('china');
$c = $b->getArrayCopy();
// print_r($b);
// print_r($c);

// foreach (new InfiniteIterator(new ArrayIterator($array)) as $value) {
//     print($value . PHP_EOL);
// }

// foreach (new LimitIterator(new ArrayIterator($array), 20, 10) as $value) {
//     print($value . PHP_EOL);
// }

// foreach (new DirectoryIterator(__DIR__) as $item) {
//     var_dump($item);
// }

// foreach (new FilesystemIterator(__DIR__) as $item){
//     var_dump($item);
// }

// foreach (new RecursiveDirectoryIterator(__DIR__) as $item){
// var_dump($item);
// }

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(dirname(__DIR__))) as $item){
var_dump($item);
}



class FileTypeFilterIterator extends FilterIterator
{


    public $FILTERS ;

    public function __construct($iterator, $ext){
        $this->FILTERS = $ext;
        parent::__construct($iterator);
    }

    public function accept()
    {
        $item = $this->current();
        return in_array(strtolower(pathinfo($item->getFilename(), PATHINFO_EXTENSION)), $this->FILTERS);
    }
}

// foreach (new FileTypeFilterIterator(new RecursiveIteratorIterator(new RecursiveDirectoryIterator(dirname(__DIR__))), ['php']) as $item){
//     var_dump($item);
// }
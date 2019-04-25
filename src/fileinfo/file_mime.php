<?php
/**
 *
 */

$fileUrl = 'http://d.hiphotos.baidu.com/image/pic/item/ac4bd11373f0820271f4125045fbfbedab641b7e.jpg';


$string = file_get_contents($fileUrl);
$fileName = tempnam(__DIR__,'ava');
file_put_contents($fileName, $string);

$mime = mime_content_type($fileName);
var_dump($mime);
unlink($fileName);

<?php

require_once dirname(__DIR__) . '/../vendor/autoload.php';

use Intervention\Image\ImageManagerStatic;

$image = ImageManagerStatic::make('example.jpg');
$image->resize(100, 100);
echo $image->response('png');
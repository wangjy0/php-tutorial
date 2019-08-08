<?php
require_once dirname(__DIR__) . '/../vendor/autoload.php';

use Imagecow\Image;

Image::fromFile('./example.jpg')->resizeCrop(100, 100)->show();
<?php

use Composer\CaBundle\CaBundle;

require_once 'vendor/autoload.php';


$caPathOrFile =  CaBundle::getSystemCaRootBundlePath();
$caPathOrFile = realpath($caPathOrFile);
print $caPathOrFile;
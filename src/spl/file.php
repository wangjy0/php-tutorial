<?php
$file = new SplFileInfo(realpath(__DIR__ . '/../data.json'));

// var_dump($file);

$file = new SplFileObject(realpath(__DIR__ . '/../data.json'));

$file->fpassthru();

$tempFile = new SplTempFileObject();

for ($i =1; $i<=100; $i++){
    $tempFile->fputcsv([
        'id' => $i,
        'name' => 'test' . $i
    ]);
}

// $tempFile->rewind();
// $tempFile->fpassthru();
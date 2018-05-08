<?php
$ch = curl_init();

$url = 'http://httpbin.org/post';
$cfile = curl_file_create('1.jpg');
$data = [
    'foo' => 'bar',
    'file1'=> $cfile,
];
// set url
curl_setopt($ch, CURLOPT_URL, $url);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// set post
curl_setopt($ch, CURLOPT_POST, 1);

// set post data
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// $output contains the output string
$output = curl_exec($ch);

if (curl_errno($ch)) {
    print_r(curl_error($ch));
} else {
    print_r($output);
}
// close curl resource to free up system resources
curl_close($ch);
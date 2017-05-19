<?php

$url = 'http://httpbin.org/get';

$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, $url);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

if (curl_errno($ch)) {
    var_dump(curl_error($ch));
} else {
    var_dump($output);
}
// close curl resource to free up system resources
curl_close($ch);

<?php

$url = 'http://httpbin.org/post';


$param = ['name'=>'wangjinyu'];

$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, $url);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// set post
curl_setopt($ch, CURLOPT_POST, 1);

// set post data
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));

// $output contains the output string
$output = curl_exec($ch);

if (curl_errno($ch)) {
    var_dump(curl_error($ch));
} else {
    var_dump($output);
}
// close curl resource to free up system resources
curl_close($ch);

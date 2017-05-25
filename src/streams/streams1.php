<?php
$opts = [
    'http' => [
        'method' => "GET",
        ''
    ]
];

$context = stream_context_create($opts);

$content = file_get_contents('http://www.sohu.com', false, $context);

print $content;
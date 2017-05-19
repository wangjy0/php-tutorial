<?php

function urlsafe_b64encode($string)
{
    $data = base64_encode($string);
    $data = str_replace([
        '+',
        '/',
        '=',
    ], [
        '-',
        '_',
        '',
    ], $data);

    return $data;
}

function urlsafe_b64decode($string)
{
    $data = str_replace([
        '-',
        '_',
    ], [
        '+',
        '/',
    ], $string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }

    return base64_decode($data);
}

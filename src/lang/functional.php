<?php

$input = [
        1,
        2,
        3,
        4,
        5,
        6,
];

// The function doesn't need to be assigned to a variable. This is valid too:
$output = array_filter($input, function ($item) {
    return ($item % 2) == 0;
});

print_r($output);

function criteria_greater_than($min)
{
    return function ($item) use ($min) {
        return $item > $min;
    };
}

// Use array_filter on a input with a selected filter function
$output = array_filter($input, criteria_greater_than(3));

print_r($output); // items > 3


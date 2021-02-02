<?php

return [
    'required' => [
        'method' => 'required',
        'error_message' => 'Please Fill Form'
    ],
    'min' => [
        'method' => 'min',
        'error_message' => 'Minimum Number of Character is '
    ],
    'max' => [
        'method' => 'max',
        'error_message' => 'Maximum Number of Character is '
    ],
    'string' => [
        'method' => 'string_function',
        'error_message' => 'Input Value Must Be a Text Type'
    ],
    'number' => [
        'method' => 'number_function',
        'error_message' => 'Input Value Must Be a Number Type'
    ],
    'range' => [
        'method' => 'range_function',
        'error_message' => 'Input Value Must Be a '
    ],

];


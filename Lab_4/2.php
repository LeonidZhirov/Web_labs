<?php

echo "\nЗадание 2\n";
$str = 'a1b2c3';
$result = preg_replace_callback('/\d+/', function($matches) {
    return $matches[0] + 10;
}, $str);
echo "$result\n";
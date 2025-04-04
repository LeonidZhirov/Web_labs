<?php

echo "Задание 1";
$str = 'ahb acb aeb aeeb edce axeb';
$regexp = '/e..e/';
$matches = array();
$count = preg_match_all($regexp, $str, $matches);
echo "Найдено ссылок: ($count)\n";
var_dump($matches);
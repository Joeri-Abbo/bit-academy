<?php

$input = $argv[1];
$value = (int)$input;
$metric = str_replace($value, '', $input);

$seconds = 0;
switch ($metric) {
    case 'd':
        $seconds = $value * 24 * 60 * 60;
        break;
    case 'u':
        $seconds = $value * 60 * 60;
        break;
    case 'm':
        $seconds = $value * 60;
        break;
    case 's':
        $seconds = $value;
        break;
}

echo "$seconds seconden" . PHP_EOL;
<?php

$items = $argv;
unset($items[0]);
$seconds = 0;
if (!empty($items)) {
    foreach ($items as $item) {
        $value = (int)$item;
        $metric = str_replace($value, '', $item);
        $seconds = get_seconds_from($seconds, $value, $metric);
    }
} else {
    echo "Geen tijd gevonden" . PHP_EOL;
    exit();
}
echo "$seconds seconden" . PHP_EOL;

function get_seconds_from(int $seconds, int $value, string $metric)
{
    switch ($metric) {
        case 'd':
            $seconds += $value * 24 * 60 * 60;
            break;
        case 'u':
            $seconds += $value * 60 * 60;
            break;
        case 'm':
            $seconds += $value * 60;
            break;
        case 's':
            $seconds += $value;
            break;
        default:
            $seconds += 0;
            break;
    }

    return $seconds;
}
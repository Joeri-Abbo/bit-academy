<?php

define('COINS', [
    50,
    20,
    10,
    5,
    2,
    1,
    0.50,
    0.20,
    0.10,
    0.05
]);

function roundToNearestFiveCents($amount)
{
    $rounded = round($amount * 20) / 20;
    $remainder = fmod($rounded, 0.05);
    if ($remainder < 0.025) {
        $rounded -= $remainder;
    } else {
        $rounded += 0.05 - $remainder;
    }
    return $rounded;
}

$amount = floatval(str_replace(',', '.', $argv[1]));

if ($amount == 0) {
    echo "Geen wisselgeld";
    exit();
}

$amount = roundToNearestFiveCents($amount);

foreach (COINS as $coin) {
    $coinFormatted = ($coin < 1) ? $coin * 100 . " cents" : $coin . " euro";

    $times = floor($amount / $coin);

    if ($times > 0) {
        $amount = round($amount - ($times * $coin), 2);
        echo "$times x $coinFormatted" . PHP_EOL;
    }

    if ($amount < 0.05) {
        break;
    }
}

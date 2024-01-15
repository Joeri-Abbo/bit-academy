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

function parseAmount($input)
{
    $parsed = floatval(str_replace(',', '.', $input));
    if ($parsed <= 0) {
        throw new Exception("Invalid amount: $input");
    }
    return $parsed;
}

function getChange($amount)
{
    $amount = roundToNearestFiveCents($amount);
    $change = [];

    foreach (COINS as $coin) {
        $coinFormatted = ($coin < 1) ? $coin * 100 . " cents" : $coin . " euro";

        $times = floor($amount / $coin);

        if ($times > 0) {
            $amount = round($amount - ($times * $coin), 2);
            $change[] = "$times x $coinFormatted";
        }

        if ($amount < 0.05) {
            break;
        }
    }

    return $change;
}

function displayChange($change)
{
    if (empty($change)) {
        echo "Geen wisselgeld";
    } else {
        echo implode(PHP_EOL, $change);
    }
}


if ($argv[1] == 0) {
    echo "Geen wisselgeld";
    exit();
}

if ($argv[1] < 0) {
    echo "Input moet een positief getal zijn";
    exit();
}
try {
    $amount = parseAmount($argv[1]);
    $change = getChange($amount);
    displayChange($change);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

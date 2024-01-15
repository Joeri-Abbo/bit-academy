<?php

$amount = intval($argv[1]);

$coins = [
    10,
    5,
    2,
    1
];

if ($amount == 0) {
    echo "Geen wisselgeld";
    exit();
}

foreach ($coins as $coin) {
    if ($amount >= $coin) {
        $times = floor($amount / $coin);
        $amount = $amount - ($times * $coin);
        echo "$times x $coin euro" . PHP_EOL;
    }
}

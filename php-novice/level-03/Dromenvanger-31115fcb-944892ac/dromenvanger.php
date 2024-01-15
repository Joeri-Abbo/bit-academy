<?php

echo "Hoeveel vrienden zal ik vragen om hun droom?" . PHP_EOL;
$number = readline();

if (!is_numeric($number)) {
    exit($number . " is geen getal, probeer het opnieuw");
}

$items = [];

for ($i = 1; $i <= $number; $i++) {
    echo "Wat is jouw naam?" . PHP_EOL;
    $name = readline();

    echo "Hoeveel dromen ga je opgeven?" . PHP_EOL;
    $number2 = readline();

    if (!is_numeric($number2)) {
        exit($number2 . " is geen getal, probeer het opnieuw");
    }

    $items[$name] = [];

    for ($j = 1; $j <= $number2; $j++) {
        echo "Wat is jouw droom?" . PHP_EOL;
        $dream = readline();
        $items[$name][] = $dream;
    }
}

foreach ($items as $name => $dreams) {
    foreach ($dreams as $dream) {
        echo $name . " heeft dit als droom: " . $dream . PHP_EOL;
    }
}
<?php

echo 'Hoeveel landen ga je toevoegen?' . PHP_EOL;

$number = readline();

$items = [];

for ($i = 1; $i <= $number; $i++) {
    echo 'Welk land wil je toevoegen?' . PHP_EOL;
    $country = readline();
    echo 'Wat is de hoofdstad van ' . $country . '?' . PHP_EOL;
    $capital = readline();
    $items[$country] = $capital;
}

echo 'De volgende landen en steden zitten in de database:' . PHP_EOL;

foreach ($items as $country => $capital) {
    echo $country . ', ' . $capital . PHP_EOL;
}
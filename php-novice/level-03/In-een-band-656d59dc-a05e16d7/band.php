<?php

$albums = [
    "Citizen of Glass" => 4.5,
    "Night" => 9,
    "New Eyes" => 5,
    "Strange Trails" => 10
];

echo "Het albumoverzicht:" . PHP_EOL;

$total = 0;
foreach ($albums as $album => $price) {
    echo $album . " kost €" . $price . PHP_EOL;
    $total += $price;
}
echo "Het totaalbedrag van alle albums is €" . $total . PHP_EOL;
echo "De gemiddelde prijs van alle albums is €" . $total / count($albums) . PHP_EOL;
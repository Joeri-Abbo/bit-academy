<?php

$items = [
    "Japan" => "Tokyo",
    "Mexico" => "Mexico-Stad",
    "USA" => "Washington D.C.",
    "India" => "New Delhi",
    "Zuid-Korea" => "Seoul",
    "China" => "Peking",
    "Nigeria" => "Abuja",
    "Argentinië" => "Buenos Aires",
    "Egypte" => "Cairo",
    "Engeland" => "Londen"
];

$correct = 0;
foreach ($items as $key => $value) {
    echo "Welke hoofdstad heeft " . $key . "?" . PHP_EOL;
    $answer = readline();
    if ($answer == $value) {
        echo "Correct!" . PHP_EOL;
        $correct++;
    } else {
        echo "Helaas, " . $answer . " is niet de hoofdstad van " . $key . "." . PHP_EOL;
        echo "Het correcte antwoord is: " . $value . PHP_EOL;
    }
}
echo sprintf("Je hebt %d van de 10 goed geraden!", $correct) . PHP_EOL;
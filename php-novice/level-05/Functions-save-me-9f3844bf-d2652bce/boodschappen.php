<?php

$list = array();
$list = getShoppingList($list);
echo "Bedankt voor het gebruik van de boodschappenlijst!" . PHP_EOL;

while (strtolower(substr(trim(readline("Wil je meer producten toevoegen? (y/n)")), 0, 1)) === 'y') {
    $list = getShoppingList($list);
}

function getShoppingList($list)
{
    $product = readline("Wat wil je aan je boodschappenlijst toevoegen?");
    array_push($list, $product);
    echo "Je boodschappen lijstje bevat nu:" . PHP_EOL;
    foreach ($list as $value) {
        echo $value . PHP_EOL;
    }
    return $list;
}
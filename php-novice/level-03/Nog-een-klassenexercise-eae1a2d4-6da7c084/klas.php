<?php

echo "Wie zitten er in de klas?" . PHP_EOL;
$classmates = explode(" ", readline());

echo "De studenten in de klas zijn:" . PHP_EOL;
foreach ($classmates as $classmate) {
    echo $classmate . PHP_EOL;
}
<?php

echo "Hoeveel stapels wil je hebben? " . PHP_EOL;
$stapels = readline();

while (!is_numeric($stapels)) {
    echo "Gebruik cijfers!" . PHP_EOL;
    $stapels = readline();
}

$i = 1;
while ($i <= $stapels) {
    $j = 1;
    while ($j <= $i) {
        echo "*";
        $j++;
    }
    echo PHP_EOL;
    $i++;
}

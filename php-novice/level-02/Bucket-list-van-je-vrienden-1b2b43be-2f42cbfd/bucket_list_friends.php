<?php

$dreams = [];

while (true) {
    $count = readline("Hoeveel vrienden zal ik vragen om hun droom?" . PHP_EOL);

    if (is_numeric($count)) {
        break;
    } else {
        echo sprintf("'%s' is geen getal, probeer het opnieuw", $count) . PHP_EOL;
    }
}

for ($i = 1; $i <= $count; $i++) {
    $name = readline("Wat is jouw naam?" . PHP_EOL);
    $dream = readline("Wat is jouw droom?" . PHP_EOL);
    $dreams[$name] = $dream;
}

foreach ($dreams as $name => $dream) {
    echo sprintf("%s heeft dit als droom : %s", $name, $dream) . PHP_EOL;
}

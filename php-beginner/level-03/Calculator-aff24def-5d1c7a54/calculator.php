<?php

echo "Welke operatie wil je uitvoeren? (+, -)\n";
$input = readline();
if ($input == "+" || $input == "-") {
    echo "Eerste getal?\n";
    $a = readline();
    if (is_numeric($a)) {
        echo "Tweede getal?\n";
        $b = readline();
        if (is_numeric($b)) {
            if ($input == "+") {
                echo "Uw resultaat is: " . ($a + $b);
            } elseif ($input == "-") {
                echo "Uw resultaat is: " . ($a - $b);
            }
        } else {
            echo "Dit is geen getal";
        }
    } else {
        echo "Dit is geen getal";
    }
} else {
    echo "Dit is geen geldige operatie";
}
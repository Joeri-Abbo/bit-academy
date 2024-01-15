<?php

function parseToInteger($value)
{
    if (!is_numeric($value)) {
        return "Input moet een valide getal zijn";
    }
    return (int)$value;
}

// Pas de code hieronder niet aan!

echo parseToInteger(10) . PHP_EOL;
echo parseToInteger("101") . PHP_EOL;
echo parseToInteger("Hallo wereld!") . PHP_EOL;

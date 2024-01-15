<?php

echo "Vul een getal in";

$input = readline();

if ($input % 2 == 0) {
    echo "Dit is een even getal";
} else {
    echo "Dit is een oneven getal";
}
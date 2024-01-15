<?php

function countDown($number)
{
    if ($number < 0 || $number > 10) {
        throw new Exception('Ongeldig getal! Het getal moet tussen 0 en 10 liggen.');
    } else {
        echo 'Correct getal!';
    }
}

try {
    $input = 12;
    countDown($input);
} catch (Exception $e) {
    echo 'oh no anyway';
}

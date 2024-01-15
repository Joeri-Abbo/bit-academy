<?php

function countDown($number)
{
    if ($number < 0 || $number > 10) {
        error_log('Ongeldig getal! Het getal moet tussen 0 en 10 liggen.');
    } else {
        echo 'Correct getal!';
    }
}

try {
    $input = 12;
    countDown($input);
} catch (Exception $e) {
    error_log('Fout opgetreden: ' . $e->getMessage());
}
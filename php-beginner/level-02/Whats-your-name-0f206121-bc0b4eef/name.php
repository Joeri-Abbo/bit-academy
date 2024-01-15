<?php

echo "Wat is je voornaam?\n";
$first_name = readline();

echo "Wat is je achternaam?\n";
$last_name = readline();

$name = $first_name . " " . $last_name;
echo "Jouw naam is: " . $name;
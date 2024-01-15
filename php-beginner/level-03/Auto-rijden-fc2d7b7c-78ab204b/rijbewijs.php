<?php

echo "Hoe oud ben je?\n";
$input = readline();
if ($input < 16.5) {
    echo "Helaas, je mag nog niet beginnen met rijlessen";
} else {
    echo "Je mag beginnen met rijlessen!";
}
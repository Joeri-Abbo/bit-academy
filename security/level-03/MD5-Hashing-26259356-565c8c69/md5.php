<?php

try {
    echo md5($argv[1]);
} catch (Exception $e) {
    echo "Ik kon de hash niet berekenen.";
}


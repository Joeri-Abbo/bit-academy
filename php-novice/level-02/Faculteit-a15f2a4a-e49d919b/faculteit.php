<?php

function calculateFactorial($number)
{
    $factorial = 1;
    for ($i = 1; $i <= $number; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

echo "Van welk getal wil je de faculteit weten?" . PHP_EOL;
$number = (int)readline();

$result = calculateFactorial($number);
echo "The factorial of $number is $result" . PHP_EOL;
?>

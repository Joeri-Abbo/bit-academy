<?php

echo "How many stacks do you want? " . PHP_EOL;
$stacks = readline();

while (!is_numeric($stacks)) {
    echo "Use numbers!" . PHP_EOL;
    $stacks = readline();
}

for ($i = 1; $i <= $stacks; $i++) {
    $stars = str_repeat('*', $i);
    echo $stars . PHP_EOL;
}

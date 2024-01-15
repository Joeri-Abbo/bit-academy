<?php

$activities = [];

// Ask the user how many activities they want to add
while (true) {
    $count = readline("Hoeveel activiteiten wil je toevoegen?" . PHP_EOL);

    if (is_numeric($count)) {
        break;
    } else {
        echo sprintf("'%s' is geen getal, probeer het opnieuw", $count) . PHP_EOL;
    }
}

// Ask the user for each activity and store them in the array
for ($i = 1; $i <= $count; $i++) {
    $activity = readline("Wat wil je toevoegen aan jouw bucket list?" . PHP_EOL);
    $activities[] = $activity;
}

// Print the list of activities on the bucket list
echo PHP_EOL . "Op jou bucket list staat:" . PHP_EOL;
foreach ($activities as $index => $activity) {
    echo " $activity" . PHP_EOL;
}

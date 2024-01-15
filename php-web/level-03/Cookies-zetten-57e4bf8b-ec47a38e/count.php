<?php

$count = 0;

if (isset($_COOKIE['count'])) {
    $count = $_COOKIE['count'];
}

$count++;

setcookie('count', $count, time() + 3600);
echo "Je hebt deze pagina " . $count . " keer bezocht.";
?>

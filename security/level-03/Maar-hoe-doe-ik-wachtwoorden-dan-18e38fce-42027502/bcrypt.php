<?php

$password = $argv[1] ?? false;
if (!$password) {
    echo "Geen wachtwoord meegegeven!" . PHP_EOL;
    exit;
}

$password_hashed = password_hash($password, PASSWORD_BCRYPT);
echo $password_hashed . PHP_EOL;

if (password_verify(readline("wachtwoord ter controle: "), $password_hashed)) {
    echo "Wachtwoord klopt!" . PHP_EOL;
} else {
    echo "Wachtwoord klopt niet!" . PHP_EOL;
}

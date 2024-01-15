<?php

/**
 * @param string $message
 * @param string $key
 * @return string
 */
function encryptMessage(string $message, string $key): string
{
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-128-gcm'));
    $encrypted = openssl_encrypt($message, 'aes-128-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag);
    $ciphertext = $iv . $encrypted . $tag;

    return base64_encode($ciphertext);
}

if ($argc < 3) {
    echo "Gebruik: php script.php [bericht] [sleutel]\n";
    exit(1);
}

$message = $argv[1];
$key = $argv[2];

$encryptedMessage = encryptMessage($message, $key);

echo sprintf("ciphertext: %s", $encryptedMessage) . PHP_EOL;
echo "origineletext: " . $message . PHP_EOL;

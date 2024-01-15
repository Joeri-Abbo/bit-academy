<?php

$message = isset($argv[1]) ? $argv[1] : '';
if (empty($message)) {
    echo "Gebruik: php caesar-cipher.php <bericht>\n";
    exit(1);
}

/**
 * @param string $message
 * @param int $shift
 * @return string
 */
function caesarCipherEncrypt(string $message, int $shift): string
{
    $encryptedMessage = '';
    for ($i = 0; $i < strlen($message); $i++) {
        $char = $message[$i];

        if (ctype_alpha($char)) {
            $asciiOffset = ord(ctype_upper($char) ? 'A' : 'a');
            $encryptedChar = chr(($shift + ord($char) - $asciiOffset) % 26 + $asciiOffset);
            $encryptedMessage .= $encryptedChar;
        } else {
            $encryptedMessage .= $char;
        }
    }

    return $encryptedMessage;
}

$shift = 3;
echo caesarCipherEncrypt($message, $shift);

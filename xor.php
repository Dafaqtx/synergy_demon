<?php

// реализация функции xor для шифрования
function xorS($string, $key)
{
    $outText = '';
    for ($i = 0; $i < strlen($string);) {
        for ($j = 0; $j < strlen($key); $j++, $i++) {
            $outText .= $string{$i} ^ $key{$j};
        }
    }
    
    return $outText;
}

$cipher = base64_encode(xorS($message, $key)); // шифруем и применяем base64_encode

?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $textoCriptografado = $_POST["texto"];
    $chave = 3; // A mesma chave usada para criptografar

    $textoDescriptografado = descriptografarCesar($textoCriptografado, $chave);

    echo $textoDescriptografado;
}

function descriptografarCesar($texto, $chave) {
    return criptografarCesar($texto, -$chave);
}

function criptografarCesar($texto, $chave) {
    $textoCriptografado = '';

    for ($i = 0; $i < strlen($texto); $i++) {
        $char = $texto[$i];

        if (ctype_alpha($char)) {
            $ascii = ord($char);
            $ascii += $chave;

            if (ctype_upper($char)) {
                if ($ascii > ord('Z')) {
                    $ascii -= 26;
                } elseif ($ascii < ord('A')) {
                    $ascii += 26;
                }
            } else {
                if ($ascii > ord('z')) {
                    $ascii -= 26;
                } elseif ($ascii < ord('a')) {
                    $ascii += 26;
                }
            }

            $textoCriptografado .= chr($ascii);
        } else {
            $textoCriptografado .= $char;
        }
    }

    return $textoCriptografado;
}

?>

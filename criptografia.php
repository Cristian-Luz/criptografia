<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $textoOriginal = $_POST["texto"];
    $chave = 3; // A chave para a cifra de César

    $textoCriptografado = criptografarCesar($textoOriginal, $chave);

    echo $textoCriptografado;
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
                }
            } else {
                if ($ascii > ord('z')) {
                    $ascii -= 26;
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

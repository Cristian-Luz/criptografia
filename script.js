function criptografar() {
    var textoOriginal = document.getElementById('inputText').value;
    enviarParaServidor('criptografia.php', textoOriginal);
}

function descriptografar() {
    var textoCriptografado = document.getElementById('inputText').value;
    enviarParaServidor('descriptografar.php', textoCriptografado);
}

function enviarParaServidor(script, texto) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('resultado').innerHTML = xhr.responseText;
        }
    };

    xhr.open('POST', script, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('texto=' + texto);
}

function limparResultado() {
    document.getElementById('resultado').innerHTML = '';
    document.getElementById('inputText').value = '';
}

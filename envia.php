<?php

    $nome = $_POST["nome"];
    $msg = $_POST["msg"];
    $envia = "
        <div class='msg'>
            <h1>Nome: {$nome}</h1>
            <p>{$msg}</p>
        </div>
    ";

    function grava($text){
        $arv = "mensagens.txt";

        $fp = fopen($arv, 'a+');

        fwrite($fp, $text);

        fclose($fp);
    }

    grava($envia);

?>
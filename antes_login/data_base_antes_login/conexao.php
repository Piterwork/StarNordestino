<?php

    $hostname = "127.0.0.1:3312";
    $bancodedados = "starnordestino";
    $usuario = "root";
    $senha = "";

    $conexao = new mysqli ($hostname, $usuario, $senha, $bancodedados);
    if ($conexao->connect_errno){
        echo "Falha ao conectar: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
    }
    else
        // echo "Conectado ao Banco de Dados";

?>
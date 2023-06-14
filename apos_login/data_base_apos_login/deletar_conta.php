<?php

    session_start();

    include ('conexao.php');

    $id_verificacao = $_SESSION['id_verificacao'];

    $sqlSelect = "SELECT * FROM starnordestino.agendamento WHERE id_agendamento = '$id_verificacao' ";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0)
    {
        $sqlDelete = "DELETE FROM starnordestino.agendamento WHERE id_agendamento = $id_verificacao";
        $resultDelete = $conexao->query($sqlDelete);
    }

    $sqlSelect = "SELECT * FROM starnordestino.cadastro WHERE id_cadastro = '$id_verificacao' ";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0)
    {
        $sqlDelete = "DELETE FROM starnordestino.cadastro WHERE id_cadastro = $id_verificacao";
        $resultDelete = $conexao->query($sqlDelete);
    }

    unset($_SESSION['email']);
    unset($_SESSION['senha']);

	header('Location: ../../antes_login/inicio/inicio.html');
   
?>
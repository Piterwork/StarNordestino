<?php

    include ('conexao.php');

    $nome_suporte = ($_POST['nome_suporte']);
    $email_suporte = ($_POST['email_suporte']);
    $mensagem_suporte = ($_POST['mensagem_suporte']);

    $sql = "INSERT INTO starnordestino.suporte(id_suporte, nome_suporte, email_suporte, mensagem_suporte) values(null, '$nome_suporte', '$email_suporte', '$mensagem_suporte')";

    $result = mysqli_query($conexao, $sql);
    
?>
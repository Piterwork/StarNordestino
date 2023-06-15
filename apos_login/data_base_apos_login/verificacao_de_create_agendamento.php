<?php
    session_start();
    include ('conexao.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../../antes_login/login/login.html');
    }

    $id_verificacao = $_SESSION['id_verificacao'];

    $sql = "SELECT * FROM starnordestino.agendamento WHERE id_agendamento = '$id_verificacao' ";

    $result = $conexao -> query($sql);

		if(mysqli_num_rows($result) >= 1)
        {
			header('Location: ../../apos_login/respostas/resposta_criar_agendamento.html');
        }
        else
        {
            header('Location: ../agendamento/agendamento.php');
        }
?>
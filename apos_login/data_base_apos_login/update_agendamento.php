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

		if(mysqli_num_rows($result) <= 0)
        {
			header('Location: ../../apos_login/respostas/resposta_editar_agendamento.html');
        }
        else
        {
            $id_cadastro = $_POST['id_cadastro'];
            $acomodacao = $_POST['acomodacao'];
            $number_adultos = $_POST['number_adultos'];
            $number_criancas = $_POST['number_criancas'];
            $date_saida = $_POST['date_saida'];
            $date_entrada  = $_POST['date_entrada'];
            $number_quartos  = $_POST['number_quartos'];

            $sql = "UPDATE starnordestino.agendamento SET acomodacao = '$acomodacao', number_adultos = '$number_adultos', number_criancas = '$number_criancas', date_saida = '$date_saida', date_entrada = '$date_entrada', number_quartos = 'number_quartos' WHERE id_agendamento = '$id_cadastro'";

            $result = mysqli_query($conexao, $sql);

            header('Location: ../../apos_login/perfil/perfil.php');

        }
    
?>
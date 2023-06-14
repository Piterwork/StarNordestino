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
    
	header('Location: ../../apos_login/respostas/resposta_apagou_agendamento.html');
   
?>
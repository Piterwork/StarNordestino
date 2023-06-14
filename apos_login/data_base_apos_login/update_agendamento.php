<?php

    include ('conexao.php');

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
    
?>
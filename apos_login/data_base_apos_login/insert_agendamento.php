<?php

    include ('conexao.php');

    $acomodacao = $_POST['acomodacao'];
    $number_adultos = $_POST['number_adultos'];
    $number_criancas = $_POST['number_criancas'];
    $date_saida = $_POST['date_saida'];
    $date_entrada  = $_POST['date_entrada'];
    $number_quartos  = $_POST['number_quartos'];


    echo $date_saida;
    echo $date_entrada;


    $sql = "INSERT INTO starnordestino.agendamento(id_agendamento, acomodacao, number_adultos, date_entrada, date_saida, number_criancas, number_quartos) values(null, '$acomodacao', '$number_adultos', '$date_entrada', '$date_saida', '$number_criancas', '$number_quartos')";

    $result = mysqli_query($conexao, $sql);
    
?>
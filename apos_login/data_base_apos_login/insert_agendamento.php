<?php
    session_start();
    include ('conexao.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../../antes_login/login/login.html');
    }
    
    $id_cadastro = $_POST['id_cadastro'];
    $acomodacao = $_POST['acomodacao'];
    $number_adultos = $_POST['number_adultos'];
    $number_criancas = $_POST['number_criancas'];
    $date_saida = $_POST['date_saida'];
    $date_entrada  = $_POST['date_entrada'];
    $number_quartos  = $_POST['number_quartos'];

    $sql = "INSERT INTO starnordestino.agendamento(id_agendamento, acomodacao, number_adultos, date_entrada, date_saida, number_criancas, number_quartos) values('$id_cadastro', '$acomodacao', '$number_adultos', '$date_entrada', '$date_saida', '$number_criancas', '$number_quartos')";

    $result = mysqli_query($conexao, $sql);

    header('Location: ../../apos_login/perfil/perfil.php');
?>
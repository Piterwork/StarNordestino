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

    $nome_usuario = $_POST['nome_usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "UPDATE starnordestino.cadastro SET nome_usuario = '$nome_usuario', email = '$email', senha = '$senha' WHERE id_cadastro = '$id_verificacao'";

    $result = mysqli_query($conexao, $sql);

    header('Location: ../../antes_login/login/login.html');
    
?>
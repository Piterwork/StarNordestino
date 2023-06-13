<?php

    include ('conexao.php');

    $nome_usuario = ($_POST['nome_usuario']);
    $email = ($_POST['email']);
    $senha = ($_POST['senha']);

    $sql = "INSERT INTO starnordestino.cadastro(id_cadastro, nome_usuario, email, senha) values(null, '$nome_usuario', '$email', '$senha')";

    $result = mysqli_query($conexao, $sql);
    
    header('Location: ../../apos_login/perfil/perfil.php');

?>
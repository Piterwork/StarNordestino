<?php

    include ('conexao.php');

    $email = ($_POST['email_newsletter']);

    $sql = "INSERT INTO starnordestino.assinatura_newsletter(id_assinatura_newsletter, email) values (null, '$email')";

    $result = mysqli_query($conexao, $sql);

    header('Location: ../respostas/dados_enviados.html');

?>
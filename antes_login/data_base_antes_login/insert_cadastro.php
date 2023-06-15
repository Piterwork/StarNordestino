<?php

    include ('conexao.php');

    $verificador_email = $_POST['email'];

    $sql = "SELECT * FROM starnordestino.cadastro WHERE email = '$verificador_email' ";

    $result = $conexao -> query($sql);

		if(mysqli_num_rows($result) >= 1) {
			// header('Location: ../../apos_login/respostas/resposta_agendamento.html');
			header('Location: ../respostas/resposta_cadastro_email.html');
        }
        else {
            $nome_usuario = ($_POST['nome_usuario']);
            $email = ($_POST['email']);
            $senha = ($_POST['senha']);
        
            $sql = "INSERT INTO starnordestino.cadastro(id_cadastro, nome_usuario, email, senha) values(null, '$nome_usuario', '$email', '$senha')";
        
            $result = mysqli_query($conexao, $sql);
            
            header('Location: ../../apos_login/perfil/perfil.php');            
        }
?>
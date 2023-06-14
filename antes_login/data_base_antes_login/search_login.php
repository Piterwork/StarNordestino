<?php

	session_start();

	if (!empty ($_POST['clicou']) || !empty ($_POST['email']) || !empty ($_POST['senha'])) {
		
		include('conexao.php');

		$email = ($_POST['email']);
		$senha = ($_POST['senha']);
		$clicou = ($_POST['clicou']);

		$sql = "SELECT * FROM starnordestino.cadastro WHERE email = '$email' and senha = '$senha'";

		$result = $conexao -> query($sql);

		if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
			header('location: ../respostas/login_resposta.html');
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
			header('Location: ../../apos_login/perfil/perfil.php');
        }
	}
	
?>
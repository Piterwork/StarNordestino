<?php

    include('conexao.php');

    $email = ($_POST['email']);
    $senha = ($_POST['senha']);
    $clicou = ($_POST['clicou']);

    echo $clicou;

    if (isset($clicou)) {

		$sql = "SELECT * FROM starnordestino.cadastro WHERE email = '$email' and senha = '$senha'";

		$result = $conexao -> query($sql);

		echo "$sql";
		
		if (mysqli_num_rows($result)<=0){
       		header('location: ../respostas/login_resposta.html');

      	}else{
	      	header('Location: https://www.google.com/');
	    }
    }
?>
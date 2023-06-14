<?php
    session_start();
    include ('../data_base_apos_login/conexao.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../../antes_login/login/login.html');
    }

    $logado = $_SESSION['email'];

    $sql = "SELECT * FROM starnordestino.cadastro WHERE email = '$logado' ";
    $query = mysqli_query($conexao,$sql);

    while($sql = mysqli_fetch_array($query)){
        $email = $sql["email"];
        $senha = $sql["senha"];
        $nome_usuario = $sql["nome_usuario"];
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>PAGINA EDITAR</title>
</head>
<body>

    <div class="backgraud" alt="fundo_cadastro">
        <div class="filtro_backgraud"></div>
    </div>

    <div class="caixa-trasparente">
        <div class="DentroDaCaixa ">

            <header class="header-caixa-trasparente">

                <div class="h1">
                    <h1>Edição</h1>
                </div>

                <div class="logo-star-nordestino">
                    <img id="logo-star-nordestino" src="../../icones_logos/logo.webp" alt="logo_StarNordestino">
                </div>

            </header>

            <div class="div-formulario">
                <form action="../data_base_apos_login/update_usuario.php" method="post">

                    <label class="label" for="nome_usuario">Nome:</label>
                    <br>
                    <input type="text" name="nome_usuario" id="nome_usuario" value="<?php echo $nome_usuario;?>" >

                    <br>
                    <br>

                    <label class="label" for="email">Email:</label>
                    <br>
                    <input type="email" name="email" id="email" value="<?php echo $email;?>" >

                    <br>
                    <br>

                    <Label class="label" for="senha">Senha:</Label>
                    <br>
                    <input type="password" name="senha" id="senha" value="<?php echo $senha;?>" >

                    <br>
                    <br>

                    <input id="button-cadastrar" type="submit" value="Confirmar Edição">

                </form>
            </div>

            <p class="continuar_com">contunuar com</p>

            <div class="contenier-footer">

                    <div class="button-footer">
                        <a href="#"><img src="../../icones_logos/google.webp" alt="logo_google"></a>
                    </div>

                    <div class="button-footer">
                        <a href="#"><img src="../../icones_logos/github.webp" alt="logo_github"></a>
                    </div>

                    <div class="button-footer">
                        <a href="#"><img src="../../icones_logos/facebook.webp" alt="logo_facebook"></a>
                    </div>

            </div>

            <!-- <div class="textos-footer">
                <div>
                    <p>Já possui uma conta?</p>
                </div>
                <div>
                    <a href="../login/login.html">Fazer Login</a>
                </div>
            </div> -->
            

        </div>
    </div>
        
</body>
</html>
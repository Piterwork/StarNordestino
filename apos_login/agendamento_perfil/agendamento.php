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
        $id_cadastro = $sql["id_cadastro"];
    }

    $sql = "SELECT * FROM starnordestino.agendamento WHERE id_agendamento = '$id_cadastro' ";
    $query = mysqli_query($conexao,$sql);

    while($sql = mysqli_fetch_array($query)){
        $id = $sql["id_agendamento"];
        $acomodacao = $sql["acomodacao"];
        $number_adultos = $sql["number_adultos"];
        $date_entrada = $sql["date_entrada"];
        $date_saida = $sql["date_saida"];
        $number_criancas = $sql["number_criancas"];
        $number_quartos = $sql["number_quartos"];
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>PAGINA DE AGENDAMENTO</title>
</head>
<body>

    <div class="backgraud" alt="fundo_agendamento">
        <div class="filtro_backgraud"></div>
    </div>

    <div class="caixa-trasparente">
        <div class="DentroDaCaixa ">

            <header class="header-caixa-trasparente">

                <div class="h1">
                    <h1>Agendamento</h1>
                </div>

                <div class="logo-star-nordestino">
                    <img id="logo-star-nordestino" src="../../icones_logos/logo.webp" alt="logo_StarNordestino">
                </div>

            </header>

            <div class="div-formulario">
                <form action="../data_base_apos_login/update_agendamento.php" method="post">
                    <div class="conenier">
                    
                        <div class="line_one">
                            <div class="div-form-one">
                                <label class="label" for="acomodacao">Acomodacao:</label>
                                <br>
                                <input type="text" name="acomodacao" id="acomodacao" value="<?php echo $acomodacao; ?>">
                            </div>

                            <div class="div-form-two">
                                <label class="label" for="number_adultos">Nº. Adultos:</label>
                                <br>
                                <input type="number" name="number_adultos" id="number_adultos" value="<?php echo $number_adultos; ?>">
                            </div>

                            <div class="div-form-three">
                                <label class="label" for="number_criancas">Nº. Crianças:</label>
                                <br>
                                <input type="number" name="number_criancas" id="number_criancas" value="<?php echo $number_criancas; ?>">
                            </div>
                        </div>

                        <div class="line_two">
                            <div class="div-form-for">
                                <Label class="label" for="date_entrada">Data de Entrada:</Label>
                                <br>
                                <input type="date" name="date_entrada" id="date_entrada" value="<?php echo $date_entrada; ?>">   
                            </div>
                            
                            <div class="div-form-five">
                                <Label class="label" for="date_saida">Data de Saida:</Label>
                                <br>
                                <input type="date" name="date_saida" id="date_saida" value="<?php echo $date_saida; ?>">  
                            </div>

                            <div class="div-form-six">
                                <Label class="label" for="number_quartos">Nº. Quartos:</Label>
                                <br>
                                <input type="number" name="number_quartos" id="number_quartos" value="<?php echo $number_quartos; ?>">  
                            </div>
                        </div>

                            <input type="hidden" name="id_cadastro" value="<?php echo $id_cadastro;?>">

                            <input id="button-confirmar" type="submit" value="Confirmar Estadia">
                    </div>
                    

                </form>
            </div>

            <p id="descricao_footer">Formas de Pagamento</p>

            <div class="contenier-footer">

                    <div class="button-footer">
                        <a href="#"><img id="icone_dinheiro" src="../../icones_logos/dinheiro.webp" alt="icone_dinheiro"></a>
                    </div>

                    <div class="button-footer">
                        <a href="#"><img id="icone_card_credito" src="../../icones_logos/cartao_credito.webp" alt="icone_cartao_credito"></a>
                    </div>

                    <div class="button-footer">
                        <a href="#"><img id="icone_paypal" src="../../icones_logos/paypal.webp" alt="icone_paypal"></a>
                    </div>

            </div>

        </div>
    </div>
        
</body>
</html>
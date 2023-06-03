<?php

    include ('../data_base/conexao.php');

    $sql = "SELECT * FROM starnordestino.agendamento ";
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
    <title>PAGINA AGENDAMENTO</title>
</head>
<body>
    <div>

        <img src="./assets/img/fundo_agendamendo.png" alt="fundo_agendamendo">

        <header>
            <h1>Agendamento</h1>
            <img src="../icones_logos/logo.png" alt="logo_star_nordestino">
        </header>

        <div>
            <form action="../data_base/insert_agendamento.php" method="post">

                <label for="acomodacao">Acomodacão</label>
                <input type="text" id="acomodacao" value="<?php echo $acomodacao; ?>" name="acomodacao">

                <label for="number_adultos">Adultos</label>
                <input type="number" id="number_adultos" value="<?php echo $number_adultos; ?>" name="number_adultos">

                <label for="number_criancas">Crianças</label>
                <input type="number" id="number_criancas" value="<?php echo $number_criancas; ?>" name="number_criancas">

                <label for="date_entrada">Data de Entrada</label>
                <input type="date" id="date_entrada" value="<?php echo $date_entrada; ?>" name="date_entrada">

                <label for="date_saida">Data de Saída</label>
                <input type="date" id="date_saida" value="<?php echo $date_saida; ?>" name="date_saida">

                <label for="number_quartos">Nº. de Quartos</label>
                <input type="number" id="number_quartos" value="<?php echo $number_quartos; ?>" name="number_quartos">

                <input type="submit" name="cliclou" value="Confirmar Estadia">

            </form>
        </div>

        <p>Formas de Pagamento</p>

        <div>
            <a href="#"><img src="../icones_logos/dinheiro.png" alt="icone_dinheiro"></a>
            <a href="#"><img src="../icones_logos/cartao_credito.png" alt="icone_cartao_credito"></a>
            <a href="#"><img src="../icones_logos/paypal.png" alt="icone_paypal"></a>
        </div>
        
    </div>
</body>
</html>
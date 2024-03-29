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
        $email = $sql["email"];
        $senha = $sql["senha"];
        $nome_usuario = $sql["nome_usuario"];
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

    if (empty ($acomodacao) || empty ($number_adultos) ||  empty ($date_entrada) ||  empty ($date_saida) ||  empty ($number_criancas) ||  empty ($number_quartos)) {

        $acomodacao = '';
        $number_adultos = '';
        $date_entrada = '';
        $date_saida = '';
        $number_criancas = '';
        $number_quartos = '';

    }    

    $_SESSION['id_verificacao'] = $id_cadastro;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Perfil</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../../icones_logos/logo_header_paginas.webp" alt="Logo">
        </div>
        
        <section>
            <nav class="menu">
                <ul class="links">
                    <li><a class="efeitonav" href="../inicio/inicio.php">Início</a></li>
                    <li><a class="efeitonav" href="../instalacoes/instalacoes.php">Instalações</a></li>
                    <li><a class="efeitonav" href="../quarto/quarto.php">Quarto</a></li>
                    <li><a class="efeitonav" href="../contato/contato.php">Contato</a></li>
                    <div class="img-perfil-nav">
                        <a href=""></a>
                    </div>
                </ul>
            </nav>            
        </section>
    </header>

    <main>
        <div class="continier-main">

            <div class="label-main">
                <h1>Sua Conta</h1>
            </div>

            <section class="section-perfil">
                <div class="box-perfil">

                    <div class="contenier-box">

                        <div class="gambiarra">
                            
                            <div class="header-perfil">
                                <div class="img-perfil"></div>
                                <h2><?php echo $nome_usuario;?></h2>
                            </div>

                            <div class="continier-main-perfil">
                                <div class="main-perfil">
                                    <p>
                                        <b>Email:</b>  <?php echo $email;?>
                                        <br>
                                        <b>Senha:</b>  <?php echo $senha;?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="section-buttons">
                            <div class="button-perfil">
                                <a href="../data_base_apos_login/deletar_conta.php" class="button-editar-informações">
                                    <p>Apagar Conta</p>
                                </a>
                            </div>

                            <div class="button-perfil">
                                <a href="../edit_usuario_perfil/editar_usuario.php" class="button-editar-informações">
                                    <p>Editar Informações</p>
                                </a>
                            </div>

                            <div class="button-perfil">
                                <a href="../data_base_apos_login/desconectar.php" class="button-editar-informações">
                                    <p>Desconectar</p>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

            <section class="section-agendamento">
                <div class="box-agendamento">

                    <div class="header-agendamento">
                        <h2>Informações de Agendamento</h2>
                    </div>

                    <div class="continier-main-agendamento">
                        <div class="main-agendamento">

                            <div class="row-one">

                                <div class="coluna-one coluna">
                                    <label for="">Acomodação:</label>  
                                    <input type="text" disabled placeholder="<?php echo $acomodacao ;?>">
                                </div>

                                <div class="coluna-two coluna">
                                    <label for="">Nº de Adultos:</label>
                                    <input type="text" disabled placeholder="<?php echo $number_adultos ;?>">
                                </div>

                                <div class="coluna-three coluna">
                                    <label for="">Nº de Crianças:</label>
                                    <input type="text" disabled placeholder="<?php echo $number_criancas ;?>">
                                </div>

                            </div>

                            <div class="row-two">

                                <div class="coluna-one coluna">
                                    <label for="">Data de Entrada:</label>  
                                    <input type="text" disabled placeholder="<?php echo $date_entrada ;?>">
                                </div>

                                <div class="coluna-two coluna">
                                    <label for="">Data de Saída:</label>
                                    <input type="text" disabled placeholder="<?php echo $date_saida ;?>">
                                </div>

                                <div class="coluna-three coluna">
                                    <label for="">Nº do Quarto:</label>
                                    <input type="number" disabled placeholder="<?php echo $number_quartos ;?>">
                                </div>                                

                            </div>

                            <div class="section-buttons-agendamento">
                                <div class="button-agendamento">
                                    <a href="../data_base_apos_login/apagar_agendamento.php" class="button-editar-informações">
                                        <p>Apagar Agendamento</p>
                                    </a>
                                </div>

                                <div class="button-agendamento">
                                    <a href="../data_base_apos_login/verificacao_de_create_agendamento.php" class="button-editar-informações">
                                        <p>Criar Agendamento</p>
                                    </a>
                                </div>

                                <div class="button-agendamento">
                                    <a href="../data_base_apos_login/verificacao_de_update_agendamento.php" class="button-editar-informações">
                                        <p>Editar Informações</p>
                                    </a>
                                </div>
                            </div>

                        </div>                        
                        
                    </div>

                </div>
            </section>
        </div>
    </main>

    <footer>
        <div class="puxador"></div>
        <div class="footer_contenier">   
    
            <section class="secao_one">
                <div>
                    <h2>Star <br> Nordestino</h2>
                    <p>252 RUA BLA BLA CEP 1234</p>
                    <p>88988123456</p>
                    <p>star_nordestino@gmail.com</p>
                </div>
            </section>
    
            <section class="secao_two">
                <div>
                    <p><a id="button-open-sobre-nos">Sobre Nós</a></p>
                    <p><a id="button-open-contato">Contato</a></p>
                    <p><a id="button-open-politica-privacidade">Política & Privacidade</a></p>
                </div>
            </section>
    
    
            <section class="secao_three">
                <div>
                    <a href="https://www.facebook.com/pages/Professor-Moreira-de-Sousa-EEEP/835618283160466">
                        <img src="../../icones_logos/facebook_footer.webp" alt="icon_facebook">
                        Facebook
                    </a>
    
                    <a href="#">
                        <img src="../../icones_logos/twitter_footer.webp" alt="icon_twitter">
                        Twitter
                    </a>
    
                    <a href="https://www.instagram.com/eeepmoreiradesousa/">
                        <img src="../../icones_logos/instagram_footer.webp" alt="icon_instagram">
                        Instagram
                    </a>
                </div>
            </section>
            
            <section class="secao_for">
                <div>
                    <div class="div_label">
                        <label for="email">Assine a nossa newsletter</label>
                    </div>
    
                    
                    <form action="#">
                        <div class="div_email">
                            <input type="email" id="email" placeholder="Endereço de Email">
                            <input id="button-footer" type="submit" value="OK">
                        </div>
                    </form>
                    
                </div>
            </section>
    
        </div>
    </footer>


    <dialog id="dialog-sobre-nos">
        <div class="contenier-dialog">

            <div class="body-dialog">
                <p>
                    <h4>SOBRE NÓS</h4>
                    <br>
                    <p>
                        <p>Localizado nas deslumbrantes praias do Nordeste do Brasil, o Hotel Star Nordestino é um refúgio paradisíaco que combina o encanto da região com uma experiência excepcional de hospedagem. Com uma localização privilegiada à beira-mar, oferecemos uma variedade de comodidades e serviços para tornar sua estadia inesquecível.</p>
                        <br>
                        <p>Nosso hotel é conhecido por sua hospitalidade calorosa e atendimento impecável. Nossa equipe dedicada está pronta para recebê-lo com um sorriso e ajudar em todas as suas necessidades durante sua estadia. Quer você esteja aqui para relaxar e desfrutar das praias de areias douradas, explorar a rica cultura local ou participar de atividades emocionantes, estamos aqui para tornar sua experiência verdadeiramente memorável.</p>
                        <br>
                        <p>Nossos quartos espaçosos e confortáveis ​​são cuidadosamente projetados para oferecer um ambiente acolhedor e relaxante. Cada quarto é equipado com comodidades modernas, como ar-condicionado, TV de tela plana, acesso Wi-Fi gratuito e banheiro privativo. Além disso, muitos de nossos quartos oferecem vistas deslumbrantes do oceano, permitindo que você acorde com uma vista panorâmica de tirar o fôlego todas as manhãs.</p>
                        <br>
                        <p>No Hotel Star Nordestino, a gastronomia é uma parte essencial da experiência. Nosso restaurante no local oferece uma ampla seleção de pratos deliciosos, desde sabores regionais até culinária internacional. Nossos chefs talentosos se esforçam para criar pratos que encantem o paladar de nossos hóspedes, utilizando ingredientes frescos e locais sempre que possível. Você também pode desfrutar de uma bebida refrescante no nosso bar à beira da piscina, enquanto relaxa ao sol e aprecia a vista panorâmica do oceano.</p>
                        <br>
                        <p>Além disso, oferecemos uma variedade de comodidades e atividades para tornar sua estadia ainda mais agradável. Nossa piscina ao ar livre é perfeita para um mergulho refrescante, e nosso centro de fitness bem equipado está disponível para quem deseja manter a forma durante as férias. Também oferecemos serviços de spa, onde você pode desfrutar de tratamentos relaxantes e revigorantes.</p>
                        <br>
                        <p>Estamos ansiosos para recebê-lo no Hotel Star Nordestino e proporcionar uma experiência única em hospedagem. Seja você um viajante em busca de descanso e tranquilidade, um amante da natureza ou um explorador cultural, temos o prazer de fazer parte da sua jornada. Entre em contato conosco para fazer sua reserva e comece a planejar suas férias dos sonhos no Nordeste do Brasil.</p>
                    </p>
                </p>
            </div>

            <div class="button-dialog">
                <button id="button-close-sobre-nos">Fechar</button>
            </div>
        </div>
    </dialog>


    <dialog id="dialog-contato">

        <div class="contenier-dialog">

            <div class="body-dialog">
                    <h4>CONTATO</h4>
                    <br>
                    <br>
                    <div class="contenier-table">
                        <table class="table-model">
                            <tr>
                                <td><b>Endereço:</b> Rua do Cruzeiro, 497</td>
                                <td><b>País:</b> Brasil</td>
                            </tr>
                            <tr>
                                <td><b>Cidade:</b> Juazeiro dos Norte - Ceará</td>
                                <td><b>Cep:</b> 63010-212</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Telefone:</b> (88) 3102-1134</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>Email:</b> eeeppms@gmail.com</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <br>
                    <h4>COLABORADORES</h4>
                    <br>
                    <br>
                    <div class="contenier-table">
                        <table class="table-model">
                            <tr>
                                <td><b>Daylla Possidone:</b> @__k_a_y_a_n_e__</td>
                                <td><b>Jamilly Lopes:</b> @lopes_jmy</td>
                            </tr>
                            <tr>
                                <td><b>Dilva Rubens:</b> @rubens.dv</td>
                                <td><b>David Lucas:</b> @davidlucas_rb</td>
                            </tr>
                        </table>
                    </div>

            </div>

            <div class="button-dialog">
             <button id="button-close-contato">Fechar</button>
            </div>
        
        </div>

    </dialog>


    <dialog id="dialog-politica-privacidade">

        <div class="contenier-dialog">
        
            <div class="body-dialog">
                <p>          
                    <h4>POLÍTICA DE PRIVACIDADE</h4>
                    <br>
                    Este site é mantido e operado pela Star Nordestino Ltda.
                    <br><br>
                    Nós coletamos e utilizamos alguns dados pessoais que pertencem àqueles que utilizam nosso site. Ao
                    fazê-lo, agimos na qualidade de controlador desses dados e estamos sujeitos às disposições da Lei
                    Federal n. 13.709/2018 (Lei Geral de Proteção de Dados Pessoais - LGPD).
                    <br><br>
                    Nós cuidamos da proteção de seus dados pessoais e, por isso, disponibilizamos esta política de
                    privacidade, que contém informações importantes sobre:
                    <br><br>
                    - Quem deve utilizar nosso site;<br>
                    - Quais dados coletamos e o que fazemos com eles;<br>
                    - Seus direitos em relação aos seus dados pessoais; <br>
                    - Como entrar em contato conosco.
                    <br><br>
                    <h5>1. Quem deve utilizar nosso site</h5>
                    Nosso site somente deve ser utilizado por pessoas que tenham, pelo menos, 16 (dezesseis) anos de
                    idade, sendo que a utilização por pessoa com menos de 18 (dezoito) anos somente será possível
                    mediante o consentimento de pelo menos um de seus pais ou responsável.
                    <br><br>
                    <h5>2. Dados que coletamos e motivos da coleta</h5>
                    Nosso site coleta e utiliza alguns dados pessoais de nossos usuários, de acordo com o disposto nesta
                    seção.
                    <br><br>
                    <i>1. Dados pessoais fornecidos expressamente pelo usuário</i>
                    <br><br>
                    Nós coletamos os seguintes dados pessoais que nossos usuários nos fornecem expressamente ao
                    utilizar nosso site:
                    <br><br>
                    - Nome Completo<br>
                    - Email<br>
                    - CPF<br>
                    - Cartões de Crédito/Débito<br>
                    - Endereço<br>
                    - Cep<br>
                    - Cidade Residente<br>
                    - Número de Telefone<br>
                    <br>
                    A coleta destes dados ocorre nos seguintes momentos:
                    <br><br>
                    Na página de Contatos para com a Empresa;
                    Ao realizar processos de pagamento para o revezamento de quartos.
                    Ao assinar a Newsletter
                    <br><br>
                    Os dados fornecidos por nossos usuários são coletados com as seguintes finalidades:
                    <br><br>
                    - Encaminhar anúncios/promoções/novidades para Email dos assinantes da Newsletter;<br>
                    - Relatórios mensais de regiões que mais utiliza nossos serviços;<br>
                    - Gerar anúncios e promoções direcionadas.
                    <br><br>
                    <i>2. Dados sensíveis</i>
                    <br><br>
                    <b>Não</b> serão coletados dados sensíveis de nossos usuários, assim entendidos aqueles definidos nos arts.
                    11 e seguintes da Lei de Proteção de Dados Pessoais. Assim, <b>não</b> haverá coleta de dados sobre origem
                    racial ou étnica, convicção religiosa, opinião política, filiação a sindicato ou a organização de caráter
                    religioso, filosófico ou político, dado referente à saúde ou à vida sexual, dado genético ou biométrico,
                    quando vinculado a uma pessoa natural.
                    <br><br>
                    <i>3. Cookies</i>
                    <br><br>
                    Cookies são pequenos arquivos de texto baixados automaticamente em seu dispositivo quando você
                    acessar e navegar por um site. Eles servem, basicamente, para seja possível identificar dispositivos,
                    atividades e preferências de usuários.
                    <br><br>
                    Os cookies não permitem que qualquer arquivo ou informação sejam extraídos do disco rígido do usuário,
                    não sendo possível, ainda, que, por meio deles, se tenha acesso a informações pessoais que não tenham
                    partido do usuário ou da forma como utiliza os recursos do site.
                    <br><br>
                    <i>a. Cookies do site</i>
                    <br><br>
                    Os cookies do site são aqueles enviados ao computador ou dispositivo do usuário e administrador
                    exclusivamente pelo site.
                    As informações coletadas por meio destes cookies são utilizadas para melhorar e personalizar a
                    experiência do usuário, sendo que alguns cookies podem, por exemplo, ser utilizados para lembrar as
                    preferências e escolhas do usuário, bem como para o oferecimento de conteúdo personalizado.
                    <br><br>
                    <i>b. Gestão de cookies</i>
                    <br><br>
                    O usuário poderá se opor à utilização de cookies pelo site, bastando que os desative no momento em que
                    começa a utilizar o serviço, seguindo as seguintes instruções:
                    <br><br>
                    Ao acessar o site aparecerá um Pop-up informando a utilização de cookies. Assim disponibilizando a opção "Desabilitar os Cookies"
                    <br><br>
                    A desativação de todos os cookies, no entanto, não será possível, uma vez que alguns deles são
                    essenciais para que o site funcione corretamente.
                    <br><br>
                    Além disso, a desativação dos cookies que podem ser desabilitados poderá prejudicar a experiência do
                    usuário, uma vez que informações utilizadas para personalizá-la deixarão de ser utilizadas.
                    <br><br>
                    <i>4. Coleta de dados não previstos expressamente</i>
                    <br><br>
                    Eventualmente, outros tipos de dados não previstos expressamente nesta Política de Privacidade poderão
                    ser coletados, desde que sejam fornecidos com o consentimento do usuário, ou, ainda, que a coleta seja
                    permitida com fundamento em outra base legal prevista em lei.
                    <br><br>
                    Em qualquer caso, a coleta de dados e as atividades de tratamento dela decorrentes serão informadas
                    aos usuários do site,
                    <br><br>
                    <h5>3. Compartilhamento de dados pessoais com terceiros</h5>
                    Nós não compartilhamos seus dados pessoais com terceiros. Apesar disso, é possível que o façamos
                    para cumprir alguma determinação legal ou regulatória, ou, ainda, para cumprir alguma ordem expedida
                    por autoridade pública.
                    <br><br>
                    <h5>4. Por quanto tempo seus dados pessoais serão armazenados</h5>
                    Os dados pessoais coletados pelo site são armazenados e utilizados por período de tempo que
                    corresponda ao necessário para atingir as finalidades elencadas neste documento e que considere os
                    direitos de seus titulares, os direitos do controlador do site e as disposições legais ou regulatórias
                    aplicáveis,
                    <br><br>
                    Uma vez expirados os períodos de armazenamento dos dados pessoais, eles são removidos de nossas
                    bases de dados ou anonimizados, salvo nos casos em que houver a possibilidade ou a necessidade de
                    armazenamento em virtude de disposição legal ou regulatória.
                    <br><br>
                    <h5>5. Bases legais para o tratamento de dados pessoais</h5>
                    Cada operação de tratamento de dados pessoais precisa ter um fundamento jurídico, ou seja, uma base
                    legal, que nada mais é que uma justificativa que a autorize, prevista na Lei Geral de Proteção de Dados
                    Pessoais.
                    <br><br>
                    Todas as Nossas atividades de tratamento de dados pessoais possuem uma base legal que as
                    fundamenta, dentre as permitidas pela legislação. Mais informações sobre as bases legais que utilizamos
                    para operações de tratamento de dados pessoais específicas podem ser obtidas a partir de nossos
                    canais de contato, informados ao final desta Política.
                    <br><br>
                    <i>1. Como o titular pode exercer seus direitos</i>
                    <br><br>
                    Os titulares de dados pessoais tratados por nós poderão exercer seus direitos por meio do formulário
                    disponibilizado no seguinte caminho: www.stamordestino/contato. Alternativamente, se desejar, o titular
                    poderá enviar um e-mail ou uma correspondência ao nosso Encarregado de Proteção de Dados Pessoais.
                    As informações necessárias para isso estão na seção "Como entrar em contato conosco' desta Política
                    de Privacidade.
                    <br><br>
                    Os titulares de dados pessoais tratados por nós poderão exercer seus direitos a partir do envio de
                    mensagem ao nosso Encarregado de Proteção de Dados Pessoais, seja por e-mail ou por
                    correspondência. As informações necessárias para isso estão na seção "Como entrar em contato
                    conosco” desta Política de Privacidade.
                    <br><br>
                    Para garantir que o usuário que pretende exercer seus direitos é, de fato, o titular dos dados pessoais
                    objeto da requisição, poderemos solicitar documentos ou outras informações que possam auxiliar em
                    sua correta identificação, a fim de resguardar nossos direitos e os direitos de terceiros. Isto somente será
                    feito, porém, se for absolutamente necessário, e o requerente receberá todas as informações
                    relacionadas.
                    <br><br>
                    <h5>6. Medidas de segurança no tratamento de dados pessoais</h5>
                    Empregamos medidas técnicas e organizativas aptas a proteger os dados pessoais de acessos não
                    autorizados e de situações de destruição, perda, extravio ou alteração desses dados.
                    <br><br>
                    .As medidas que utilizamos levam em consideração a natureza dos dados, o contexto e a finalidade do
                    tratamento, os riscos que uma eventual violação geraria para os direitos e liberdades do usuário, e os
                    padrões atualmente empregados no mercado por empresas semelhantes à nossa.
                    <br><br>
                    Entre as medidas de segurança adotadas por nós, destacamos as seguintes:
                    <br><br>
                    - Senhas criptografadas com Hash;<br>
                    - Acesso restrito ao Banco de Dados;<br>
                    - Backups de dados realizados semanalmente.<br>
                    <br>
                    Informamos, ainda, que possuímos certificação ISO 27001. Seguimos, portanto, os mais elevados
                    padrões técnicos de segurança da informação, a fim de que nos seja possível proteger os dados pessoais
                    e não pessoais de nossos usuários.
                    <br><br>
                    Ainda que adote tudo o que está ao seu alcance para evitar incidentes de segurança, é possível que
                    ocorra algum problema motivado exclusivamente por um terceiro - como em caso de ataques de <i>hackers</i>
                    ou <i>crackers</i> ou, ainda, em caso de culpa exclusiva do usuário, que ocorre, por exemplo, quando ele
                    mesmo transfere seus dados a terceiro. Assim, embora sejamos, em geral, responsáveis pelos dados
                    pessoais que tratamos, nos eximimos de responsabilidade caso ocorra uma situação excepcional como.
                    essas, sobre as quais não temos nenhum tipo de controle.
                    <br><br>
                    De qualquer forma, caso ocorra qualquer tipo de incidente de segurança que possa gerar risco ou dano
                    relevante para qualquer de nossos usuários, comunicaremos os afetados e a Autoridade Nacional de
                    Proteção de Dados acerca do ocorrido, em conformidade com o disposto na Lei Geral de Proteção de
                    Dados.
                    <br><br>
                    <h5>7. Alterações nesta política</h5>
                    A presente versão desta Política de Privacidade foi atualizada pela última vez em: 08/06/2023.
                    <br><br>
                    Reservamo-nos o direito de modificar, a qualquer momento, as presentes normas, especialmente para
                    adaptá-las às eventuais alterações feitas em nosso site, seja pela disponibilização de novas
                    funcionalidades, seja pela supressão ou modificação daquelas já existentes.
                    <br><br>
                    Sempre que houver uma modificação, nossos usuários serão notificados acerca da mudança.
                    <br><br>
                    <h5>8. Como entrar em contato conosco</h5>
                    Para esclarecer quaisquer dúvidas sobre esta Política de Privacidade ou sobre os dados pessoais que
                    tratamos, entre em contato com nosso Encarregado de Proteção de Dados Pessoais, por algum dos
                    canais mencionados abaixo:
                    <br><br>
                    E-mail: piterwork3@gmail.com
                    <br><br>
                    Endereço postal: RUA DO CRUZEIRO, 497 CENTRO. 63010-212 Juazeiro do Norte - CE.

                </p>
            </div>
    
            <div class="button-dialog">
                <button id="button-close-politica-privacidade">Fechar</button>
            </div>
            
        </div>

    </dialog>

    <script type="text/javascript" src="./assets/js/index.js" ></script>
</body>
</html>
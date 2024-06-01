<?php
    // Inicia a sessão
    session_start();

    // Verifica se um cookie de usuário existe, caso contrário cria um
    if(!isset($_COOKIE['user'])) {
        setcookie('user', 'login', time() + (86400 * 30), "/");
    }

    // Define uma variável para o nome do usuário a partir do cookie
    $username = isset($_COOKIE['user']) ? $_COOKIE['user'] : 'login';

    // Variáveis para mensagens
    $mensagem = '';
    $mensagemEmail = '';
    $mensentrada = '';

    


    // Verifica se o formulário foi enviado
    if(isset($_POST['entrar'])){//valida os campos quando aperta no botao enviar
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $remember = isset($_POST['remember']) ? $_POST['remember'] : '';

    if(empty($_POST['email']) || empty($_POST['senha']) ){
        $mensagem = "<p style='color:red;'>Erro! Necessário preencher todos os campos.</p>";
    }else{
        $mensentrada = "<p> Bem Vindo! </p>";
    }
        // a função filter_var filtra uma variavel com filtro especificado, neste caso o email
        //O filtro FILTER_VALIDATE_EMAIL valida a estrutura do e-mail informado

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $mensagemEmail = "<p style='color:red;'>Erro! Email informado não tem estrutura válida.</p>";
    }
    if ($remember === 'on') {
        setcookie('email', $email, time() + (86400 * 1), "/"); // Cookie de email para 30 dias
        setcookie('senha', $senha, time() + (86400 * 1), "/"); // Cookie de senha para 30 dias
    }
        //tratamento para verificar se a variavel ta sendo colocada ou nao
        // a função filter_var filtra uma variavel com filtro especificado, neste caso o email
        //O filtro FILTER_VALIDATE_EMAIL valida a estrutura do e-mail informado
    }
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];//declara as mesmas variaveis do "name" la no html
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        //tratamento para verificar se a variavel ta sendo colocada ou nao
        if(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha']) ){
            $mensagem = "<p style='color:red;'>Erro! Necessário preencher todos os campos.</p>";
        }else{
            $mensentrada = " Usuario Cadastrado.";
        }
        // a função filter_var filtra uma variavel com filtro especificado, neste caso o email
        //O filtro FILTER_VALIDATE_EMAIL valida a estrutura do e-mail informado

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $mensagemEmail = "<p style='color:red;'>Erro! Email informado não tem estrutura válida.</p>";
        }
        //tratamento para verificar se a variavel ta sendo colocada ou nao
        // a função filter_var filtra uma variavel com filtro especificado, neste caso o email
        //O filtro FILTER_VALIDATE_EMAIL valida a estrutura do e-mail informado

       
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> <!--imagens icons-->
</head>
<body>
    <main>
        <div class="container">
            <div class="content first-content">
                <div class="first-column">
                    <h2 class="title title-primary">Olá, leitor!</h2>
                    <p class="subtitulo">Já tem uma conta?</p>
                    <button id="signin" class="btn btn-primary">Entrar</button>
                </div>    
                <div class="second-column">
                    <h2 class="title title-second">Criar Conta</h2>
                    <p class="description description-second">Informe seus dados para registro da conta</p>
                    <form class="form" action="login.php" method="POST">
                        <label class="label-input" for="">
                            <i class="far fa-user icon-modify"></i>
                            <input type="text" name="nome" placeholder="Nome">
                        </label>
                        
                        <label class="label-input" for="">
                            <i class="far fa-envelope icon-modify"></i>
                            <input type="email" name="email" placeholder="E-mail">
                        </label>
                        
                        <label class="label-input" for="">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="password" name="senha" placeholder="Senha">
                        </label>
                        
                        <button class="btn btn-second" name="cadastrar">Cadastrar</button>
                    </form>
                    <?php 
                        // Exibe as mensagens de erro ou sucesso
                        echo $mensagem;
                        echo $mensagemEmail;
                        echo $mensentrada;
                    ?>
                </div><!-- second column -->
            </div><!-- first content -->
            <div class="content second-content">
                <div class="first-column">
                    <h2 class="title title-primary">Faça seu cadastro</h2>
                    <p></p>
                    <button id="signup" class="btn btn-primary">Cadastrar</button>
                </div>
                <div class="second-column">
                    <h2 class="title title-second">Faça seu login</h2>
                    <p class="description description-second">Informe seus dados:</p>
                    <form class="form" action="login.php" method="POST">
                        <label class="label-input" for="">
                            <i class="far fa-envelope icon-modify"></i>
                            <input type="email" name="email" placeholder="E-mail">
                        </label>
                    
                        <label class="label-input" for="">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="password" name="senha" placeholder="Senha">
                        </label>
                    
                        <div class="checkbox-container">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Lembrar Senha</label>
                        </div>

                        <button class="btn btn-second" name="entrar">Entrar</button>
                        
                    </form>
                    <?php 
                        // Exibe as mensagens de erro ou sucesso
                        echo $mensagem;
                        echo $mensagemEmail;
                        echo $mensentrada;
                    ?>
                </div><!-- second column -->
            </div><!-- second-content -->
        </div>
        <script src="script.js"></script>
        
        <footer><p>&copy; 2024 Biblioteca Virtual. Todos os direitos reservados.</p></footer>
    </main>
</body>
</html>

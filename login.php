<?php
session_start();
include 'db.php';

$mensagem = '';
$mensagemEmail = '';
$mensentrada = '';

if (isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $remember = isset($_POST['remember']) ? $_POST['remember'] : '';

    if (empty($email) || empty($senha)) {
        $mensagem = "<p style='color:red;'>Erro! Necessário preencher todos os campos.</p>";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mensagemEmail = "<p style='color:red;'>Erro! Email informado não tem estrutura válida.</p>";
        } else {
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($senha, $user['senha'])) {
                $_SESSION['user'] = $user['nome'];
                $mensentrada = "<p>Bem Vindo, {$user['nome']}!</p>";
                if ($remember === 'on') {
                    setcookie('email', $email, time() + (86400 * 30), "/");
                    setcookie('senha', $senha, time() + (86400 * 30), "/");
                }
            } else {
                $mensagem = "<p style='color:red;'>Erro! Nome de usuário ou senha incorretos.</p>";
            }
        }
    }
}

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($nome) || empty($email) || empty($senha)) {
        $mensagem = "<p style='color:red;'>Erro! Necessário preencher todos os campos.</p>";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mensagemEmail = "<p style='color:red;'>Erro! Email informado não tem estrutura válida.</p>";
        } else {
            $hashedPassword = password_hash($senha, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $hashedPassword);

            if ($stmt->execute()) {
                $mensentrada = "Usuário Cadastrado com sucesso.";
            } else {
                $mensagem = "<p style='color:red;'>Erro! Não foi possível cadastrar o usuário.</p>";
            }
        }
    }
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
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
                        echo $mensagem;
                        echo $mensagemEmail;
                        echo $mensentrada;
                    ?>
                </div>
            </div>
            <div class="content second-content">
                <div class="first-column">
                    <h2 class="title title-primary">Faça seu cadastro</h2>
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
                        echo $mensagem;
                        echo $mensagemEmail;
                        echo $mensentrada;
                    ?>
                </div>
            </div>
        </div>
        <script src="script.js"></script>
        
        <footer><p>&copy; 2024 Biblioteca Virtual. Todos os direitos reservados.</p></footer>
    </main>
</body>
</html>


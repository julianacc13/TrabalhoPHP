<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria Virtual</title>
    
    <style>


        /* ESTILO GERAL */
        * {
            font-family:Georgia, 'Times New Roman', Times, serif;
            margin:0;
        }
    
        body {
            background-color: #dfe4dd; /*cor do fundo*/
            height: 100px; /*para ocupar toda a tela*/
            text-align: center;
        }

        .flex {
            display: flex; /*flexível*/
        }

        .btn-criarConta button { /*personalização botão criar conta do menu de cima*/
            padding: 10px 40px;
            font-size: 18px;
            font-weight: 600;
            background-color: #9d564d;
            border: 0;
            border-radius: 30px;
            cursor: pointer;
            transition: .2s;
            color: #fff;
            
        }

        .btn-entrar button { /*personalização botão entrar do menu de cima*/
            padding: 10px 40px;
            font-size: 18px;
            background-color: #9d564d;
            border: 0;
            border-radius: 30px;
            cursor: pointer;
            transition: .2s;
            color: #fff;
        }

        .btn-emprestar button { /*personalização botão emprestar livro*/
            padding: 10px 40px;
            font-size: 18px;
            font-weight: 600;
            background-color: #be8983;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: .2s;
            color: #000000;
            margin-right: 0px;
        }

        h2.titulo { /*texto central*/
            color: #5d653e;
            font-size: 30px;
            text-align: center;
            padding: 10px;
        }

        button:hover{ /*hover dos botoens*/
            transform: scale(1.05);
            background-color: #9d564d;
        }

        /* ESTILO DO CABEÇALHO */
        header {
            padding: 10px;
            list-style: 1px;
            background-color: #5d653e;
            
        }

        header>.interface { 
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header a {
            color: #ffffff;
            text-decoration: none;
            display: inline-block;
            transition: .2s;
        }

        header nav.menu-desktop a:hover {
            color: #9d564d ;
        }

        header nav.menu-desktop ul li {
            display: inline-block;
            padding: 0 40px;
        }

        /* ESTILO DO TOPO DO SITE */
        section.topo-do-site {
            padding: 40px;
        }

        .topo-do-site h1 { /*titulo de cima*/
            color: #5d653e;
            font-size: 40px;
            text-align: center;
            text-shadow: 2px 1px rgb(167, 168, 168);
        }

        .topo-do-site .txt-topo-site p {/*texto de cima*/
            color: #000000;
            margin: 60px 0;
            text-align: center;
            font-size: 25px;
            text-shadow: 2px 1px #9ca185;
            margin-left: 100px;
            margin-right: 100px;
            
        }


        /* ESTILO DOS LIVROS EM DESTAQUE */
        section.livros {
            padding: 60px;
        }

        .livros .livros-box { /*caixas personalização*/
            color: #000000;
            padding: 50px;
            border-radius: 20px;
            margin-left: auto;
            margin-right: auto; 
            height: 500px;
            transition: .2s;
            background-color: #9ca185;
        }

        .livros .livros-box:hover { /*hover box de livros*/
            transform: scale(1.05);
            box-shadow: 0 0 20px #9d564d;
            
        }

        img.img-box{
            width: 230px;
            margin: 10px;
            background-color: #000000;
        }

        .livros .livros-box h3 { /*titulo box de livros*/
            font-size: 20px;
            padding: 10px;
        }

        /* ESTILO DO RODAPÉ */
        footer {
            background-color: #5d653e;
            padding: 40px;
            color: white;
        }
        .titulocontato{
            color: #5d653e;
        }
        .titulo-servicos{
            color: #5d653e;
            float: right;
            margin-top: -80px;
        }
        nav.servicos a:hover {
            color: #9d564d ;
        }
        nav.servicos ul li {
            display: inline-block;
        }
        .servicos a{
            color: #000000;
            text-decoration: none;
            float: right;
            transition: .2s;
            margin-top: -53px;
        }
        .titulocontato{
            color: #5d653e;
            float: left;
            margin-top: -15px;
        }
        .Contatos p{
            float: left;
            cursor: pointer;
        }
        section.Contatos{
            margin-top: 10px;
        }
        .Contatos{
            margin-top: 0px;
        }
        .contatos{
            color: rgb(0, 0, 0);
            border-radius: 10px;
            text-align: center;
        }  

    </style>
</head>
<body>
    <header>
        <div class="interface">
            <div class="logo">
                <a href="#">
                    <img src="imagem/livro.png.png" alt="Imagem de livro" width="90px">
                </a>
            </div><!--imagem cabeçalho "logo"-->

            <nav class="menu-desktop"> <!--menu de cima-->
                <ul>
                    <b>
                    <li><a href="Menu.php">Início</a></li>
                    <li><a href="Acervo.html">Acervo</a></li>
                    <li><a href="MeusEmprestimos.html">Meus Empréstimos</a></li>
                </b>
                </ul>
            </nav>

            <div class="btn-criarConta"> <!--botao criarConta de cima-->
                <a href="login-cadastro/login.html">
                    <button>Criar Conta</button>
                </a>
            </div>
    </header>
    <main>
        <section class="topo-do-site">
            <div class="interface">
                    <div class="txt-topo-site">
                        <h1>A sua Livraria Digital<span>!</span></h1>
                        <p><em>Explore nossa vasta coleção de livros digitais, mergulhe em mundos imaginários, viaje por épocas e culturas, e descubra o poder transformador das palavras.</em></p>

                        <div class="btn-entrar">
                            <a href="login-cadastro/login.html">
                                <button>Entre com sua conta</button>
                            </a>
                        </div>
                    </div><!--txt-topo-site-->
        </div></section><!--topo-do-site-->
        <h2 class="titulo">Alguns de nossos títulos disponíveis:</h2>
        <section class="livros">
            <div class="interface">
                <div class="flex">
                    <div class="livros-box">
                        <h3>Orgulho e Preconceito</h3>
                        <p>Jane Austen</p>
                        <img class="img-box" src="imagem/livro1.jpg.jpg" alt="Imagem livro">

                        <div class="btn-emprestar"> <!--botao de emmpréstimo-->
                            <a href="#">
                                <button>Emprestar</button>
                            </a>
                        </div>
                    </div>
                    
                    <div class="livros-box">
                        <h3>O Jardim Secreto</h3>
                        <p>Frances Hodgson Burnett</p>
                        <img class="img-box" src="imagem/livro2.png.png" alt="Imagem livro">

                        <div class="btn-emprestar"> <!--botao de emmpréstimo-->
                            <a href="#">
                                <button>Emprestar</button>
                            </a>
                        </div>
                    </div>

                    <div class="livros-box">
                        <h3>Dom Casmurro</h3>
                        <p>Machado de Assis</p>
                        <img class="img-box" src="imagem/livro3.jpg.jpg" alt="Imagem livro">

                        <div class="btn-emprestar"> <!--botao de emmpréstimo-->
                            <a href="#">
                                <button>Emprestar</button>
                            </a>
                        </div>
                    </div>
                </div><!--flex-->
            </div><!--interface-->
        </section><!--especiliadades-->
        <hr><br>
        <p class="contatos"><em>Entre em contato conosco para tirar possíveis dúvidas, enviar sua resenha e avaliação ou até mesmo sujestões de futuros livros para nosso acervo!</em></p><br>
        <div class="Contatos">
            <h2 class="titulocontato">Contatos</h2><br>
                <p>E-mail: bblivros@bblivros.com</p><br>
                <p>Tel: (41)99999-9999</p><br>
                <p>Instagram: bblivrosonline</p><br>
            </p>
        <h2 class="titulo-servicos">Serviços</h2>
                <nav class="servicos"> <!--menu parte de baixo-->
                    <ul>
                        <a href="Acervo.html">Acervo</a><br>
                        <a href="MeusEmprestimos.html">Meus Empréstimos</a><br>
                    </ul>
                </nav>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Biblioteca Virtual. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
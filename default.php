<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Página padrão</title>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="Página padrão" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', 'Helvetica', sans-serif;
            color: #000;
            padding: 0;
            margin: 0;
            line-height: 1.428;
        }
        h1, h2, h3, h4, h5, h6, p {
            padding: 0;
            margin: 0;
            color:#333333;
        }
        h1 {
            font-size: 30px;
            font-weight: 600!important;
            color: #333;
        }
        h2 {
            font-size: 24px;
            font-weight: 600;
        }
        h3 {
            font-size: 22px;
            font-weight: 600;
            line-height: 28px;
        }
        hr {
            margin-top: 35px;
            margin-bottom: 35px;
            border: 0;
            border-top: 1px solid #bfbebe;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        li {
            display: inline-block;
            float: right;
            margin-left: 20px;
            line-height: 35px;
            font-weight: 100;
        }
        a {
            text-decoration: none;
            cursor: pointer;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }
        li a {
            color: white;
            margin-left: 3px;
        }
        li > i {
            color: white;
        }
        .column-wrap a {
            color: #5c34c2;
            font-weight: 600;
            font-size:16px;
            line-height:24px;
        }
        .column-wrap p {
            color: #717171;
            font-size:16px;
            line-height:24px;
            font-weight:300;
        }
        .container {
            margin-top: 100px;
        }
        .navbar {
            position: relative;
            min-height: 45px;
            margin-bottom: 20px;
            border: 1px solid transparent;
        }
        .navbar-brand {
            float: left;
            height: auto;
            padding: 10px 10px;
            font-size: 18px;
            line-height: 20px;
        }
        .navbar-nav>li>a {
            padding-top: 11px;
            padding-bottom: 11px;
            font-size: 13px;
            padding-left: 5px;
            padding-right: 5px;
        }
        .navbar-nav>li>a:hover {
            text-decoration: none;
            color: #cdc3ea!important;
        }
        .navbar-nav>li>a i {
            margin-right: 5px;
        }
        .nav-bar img {
            position: relative;
            top: 3px;
        }
        .congratz {
            margin: 0 auto;
            text-align: center;
        }
        .message::before {
            content: " ";
            background: url(https://cdn.hostinger.com/hostinger_welcome/images/hostinger-dragon.png);
            width: 141px;
            height: 175px;
            position: absolute;
            left: -150px;
            top: 0;
        }
        .message {
            width: 50%;
            margin: 0 auto;
            height: auto;
            padding: 40px;
            background-color: #eeecf9;
            margin-bottom: 100px;
            border-radius: 5px;
            position:relative;
        }
        .message p {
            font-weight: 300;
            font-size: 16px;
            line-height: 24px;
        }
        #pathName {
            margin: 20px 10px;
            color: grey;
            font-weight: 300;
            font-size:18px;
            font-style: italic;
        }
        .column-custom {
            border-radius: 5px;
            background-color: #eeecf9;
            padding: 35px;
            margin-bottom: 20px;
        }
        .footer {
            font-size: 13px;
            color: gray !important;
            margin-top: 25px;
            line-height: 1.4;
            margin-bottom: 45px;
        }
        .footer a {
            cursor: pointer;
            color: #646464 !important;
            font-size: 12px;
        }
        .copyright {
            color: #646464 !important;
            font-size: 12px;
        }
        .navbar a {
            color: white !important;
        }
        .navbar {
            border-radius: 0px !important;
        }
        .navbar-inverse {
            background-color: #434343;
            border: none;
        }
        .column-custom-wrap{
            padding-top: 10px 20px;
        }
        @media screen and (max-width: 768px) {
            .message {
                width: 75%;
                padding: 35px;
            }
            .container {
                margin-top: 30px;
            }
        }
        }
    </style>
</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse" type="button">
                <span class="icon-bar"></span> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://www.hostinger.pt/" rel="nofollow"><img src="https://cdn.hostinger.com/hostinger_welcome/images/hostinger-logo.png" width="120" alt="Hostinger"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="https://www.hostinger.pt/tutoriais/" rel="nofollow"><i aria-hidden="true" class="fa fa-graduation-cap"></i> Tutoriais</a>
                </li>
                <li>
                    <a href="https://www.hostinger.pt/make-money-online" rel="nofollow"><i aria-hidden="true" class="fa fa-trophy"></i> Ganhe conosco</a>
                </li>
                <li>
                    <a href="https://www.hostinger.pt/afiliados" rel="nofollow"><i aria-hidden="true" class="fa fa-user"></i> Afiliados</a>
                </li>
                <li>
                    <a href="https://cpanel.hostinger.pt" rel="nofollow"><i aria-hidden="true" class="fa fa-lock"></i> Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="empty-account-page">
    <div class="container">
        <div class="row congratz">
            <h1>Sua conta foi criada</h1><em></em>
            <h2 id="pathName"><em></em></h2>
        </div>
        <div class="row message">
            <p>Website <span id="website" style="word-break:break-all;"></span> foi criado com sucesso no servidor! Por favor apague o arquivo <span style="font-weight: bold;">default.php</span> da pasta public_html e atualize seu website utilizando FTP or gerenciador de Arquivos.</p>
        </div>
        <div class="col-xs-12">
            <h2>Qual o próximo passo?</h2>
        </div>
        <div class="column-wrap clearfix">
            <div class="col-xs-12">
                <hr>
            </div>
            <div class="col-xs-12 col-sm-4 column-custom-wrap">
                <div class="column-custom">
                    <h3>Clube de Afiliados Elite</h3>
                    <br>
                    <p>Procurando for um jeito fácil de ganhar dinheiro? Aproveite o Cliube de Afiliados Hostinger - um novo e melhor programa que irá impulsionar seus valores em minutos.</p>
                    <br>
                    <a href="https://www.hostinger.pt/make-money-online" rel="nofollow">Saiba mais</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 column-custom-wrap">
                <div class="column-custom">
                    <h3 style="padding-bottom: 5px">Base de Conhecimento</h3>
                    <br>
                    <p>Você tem ideia para criar um website mas não sabe por onde começar? Todas as respostas estão aqui. Navegue pelas categorias ou simplesmente digite uma palavra para começar a pesquisa.</p>
                    <br>
                    <a href="https://support.hostinger.com.br/pt-BR/ " rel="nofollow">Saiba mais</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 column-custom-wrap">
                <div class="column-custom">
                    <h3 style="padding-bottom: 5px">Blog Hostinger</h3>
                    <br>
                    <p>Torne-se um membro da comunidade Hostinger. Inscreva-se para receber atualizações diárias da Hostinger sobre engenharia, marketing e outros assuntos de hospedagem.</p>
                    <br>
                    <a href="https://www.hostinger.com/blog/" rel="nofollow">Saiba mais</a>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="row">
                <div class="text-center" style="margin-bottom: 10px;">
                    <a href="https://cpanel.hostinger.pt" rel="nofollow">Login do Cliente</a>
                </div>
                <div class="copyright text-center">
                    Hostinger © <?php echo date("Y"); ?>. Todos os direitos reservados.
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var pathName = window.location.hostname;
    var account = document.getElementById("pathName");
    var accountText = document.getElementById("website");
    account.innerHTML = pathName;
    accountText.innerHTML = pathName;
</script>
</body>

</html>
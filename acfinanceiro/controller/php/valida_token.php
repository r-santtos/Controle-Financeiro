<?php 
    if (empty($_GET['token']) || empty($_GET['email'])) {
        include_once("/404");
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $token = mysqli_real_escape_string($conn, $_GET['token']);
        $email = mysqli_real_escape_string($conn, $_GET['email']);
    }
        $token = test_input($_GET["token"]);
        $email = test_input($_GET["email"]);
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content='Uma startup focada no desenvolvimento de software de código aberto, o famoso "open source", no site você encontrará protótipos para realização de testes.' />
    <meta name="theme-color" content="#000000" />
    <meta name="robots" content="noindex" />
    <link rel="shortcut icon" href="/app/acfinanceiro/view/images/icons/favico.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/app/acfinanceiro/controller/css/formularios.css" type="text/css" />
    <title>Nova Senha - Analista Code</title>
</head>
<body>
    <!-- CONTAINER HEADER-->
    <?php include_once('/app/acfinanceiro/controller/html/header.html');?>

    <!--CONTAINER FORMULÁRIO -->
    <main id="formulario" class="container">
        <div class="container txt">
            <h1>Nova Senha</h1>
        </div>
        <fieldset>
            <form id="form" action="/app/acfinanceiro/model/php/valida_token.php" method="post">
                <div class="container row paragrafos">
                    <p><a href="/app/acfinanceiro/view/login/">Login</a></p>
                    <p><a href="/app/acfinanceiro/view/login/registrar.php">Registrar</a></p>
                </div>
                <input class="oculto" type="text" name="token" id="token" title="token" value="<?php echo $token;?>" />
                <input class="oculto" type="email" name="email" id="email" title="email" value="<?php echo $email;?>" />

                <div class="container mostrar-senha row">
                    <input class="pass" type="password" name="senha" id="senha" placeholder="Senha" 
                    title="senha" minlength="6" maxlength="10" required />
                    <span id="marcar" onclick="marcar()" class="container olhor">&#9744;</span>
                    <span id="desmarcar" onclick="desmarcar()" class="container olhor">&#9745;</span>
                </div>
                <input class="submite" type="submit" value="enviar">
                <p>Analista Code</p>
            </form>
        </fieldset>
    </main>

    <!--CONTAINER RODAPÉ -->
    <?php include_once('/app/acfinanceiro/controller/html/footer.html');?>

    <!--CONTAINER OLHOR SENHA -->
    <script>
        function marcar(){
            document.getElementById('senha').type = 'text';
            document.getElementById('desmarcar').style.display = 'flex';
            document.getElementById('marcar').style.display = 'none';
        }

        function desmarcar(){
            document.getElementById('senha').type = 'password';
            document.getElementById('marcar').style.display = 'flex';
            document.getElementById('desmarcar').style.display = 'none';
        }
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153427274-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-153427274-1');
    </script>
</body>
</html>
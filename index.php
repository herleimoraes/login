<?php session_start() ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema Simples de Login</title>
    </head>
    <body>
        <?php
            if (!isset($_SESSION['login'])) {
                if (isset($_POST['acao'])) {
                    $login = 'herlei';
                    $senha = '123456';

                    $loginform = $_POST['login'];
                    $senhaform = $_POST['senha'];

                    if ($login == $loginform && $senha == $senhaform) {
                        //Logado com sucesso!
                        $_SESSION['login'] = $login;
                        //Redirecionar caso logado com sucesso
                        header('Location: index.php');
                    } else {
                        //Ocorreu algum erro!
                        echo 'Dados inválidos.';
                    }
                }
                include ('login.php');
            }else {
                if (isset($_GET['logout'])) {
                    unset($_SESSION['login']);
                    session_destroy();
                    header('Location: index.php');
                    
                }
                include ('home.php');
            }
        ?>
    </body>
</html>
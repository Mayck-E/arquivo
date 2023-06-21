<?php
require_once("./conexao/db.php");   
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página de Login">
    <meta name="author" content="Mayck">
    <title>Login</title>
    <link rel="icon" href="imagens/icone.ico">  
    <!-- linkando o boostratp -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <!-- linkando o css -->
    <link href="./css/login.css" rel="stylesheet">
     <!-- linkando o fontawesome -->
    <link href="./fontawesome/css/all.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin">
        <form method="POST" action="processa_php/valida_login.php">            
            <i class="fa fa-user"></i> <br /> <br />            
            <input type="text" name="email" class="form-control" placeholder="E-mail"
             required autofocus> 
            <br />            
            <input type="password" name="senha" class="form-control" placeholder="Senha" required>
            <br />
            <button class="w-100 btn btn-lg btn-primary" type="submit">Logar</button>

        </form>
    </main>

    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
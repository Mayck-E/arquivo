<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>TI - Listar usuarios com Delete</title>
</head>
<body>
    <?php 
    include_once './conexao.php';

    echo "<h2>Listar usuarios com delete</h2>";
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    

    
    $query_users = "SELECT id, nome, email FROM usuarios ORDER BY id DESC LIMIT 40";
    $result_users = $conn->prepare($query_users);
    $result_users->execute();

    while($row_user = $result_users->fetch(PDO::FETCH_ASSOC)){
        extract($row_user);
        echo "ID: " . $id . "<br>";
        echo "Nome: " . $nome . "<br>";
        echo "E-mail: " . $email . "<br>";
        echo "<a href='delete-proc_delete?id=$id'>Excluir</a><br>";
        echo "<hr>";
    }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TI - LIMIT e OFFSET</title>
</head>
<body>
    <?php
    include_once './conexao.php';

    echo "<h2>Listar usuários com LIMIT</h2>";
    $query_users = "SELECT id, nome, email FROM usuarios LIMIT 3";
    $result_users = $conn->prepare($query_users);
    $result_users->execute();

    while($row_user = $result_users->fetch(PDO::FETCH_ASSOC)){

        echo "ID" . $row_user['id'] . "<br>";
        echo "Nome:" . $row_user['nome'] . "<br>";
        echo "E-mail:" . $row_user['email'] . "<br>";
        echo "<hr>";
    }
 
    //LIMIT COM OFFSET
    echo "<h2>Listar usuários com LIMIT e OFFSET</h2>";
    $query_users_b = "SELECT id, nome, email FROM usuarios LIMIT 3 offset 2";
    $result_users_b = $conn->prepare($query_users_b);
    $result_users_b->execute();

    while($row_users_b = $result_users_b->fetch(PDO::FETCH_ASSOC)){
        echo "ID" . $row_users_b['id'] . "<br>";
        echo "Nome:" . $row_users_b['nome'] . "<br>";
        echo "E-mail:" . $row_users_b['email'] . "<br>";
        echo "<hr>";   
    }
   ?>
</body>
</html>
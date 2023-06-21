<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>where</title>
</head>
<body>
    <?php
    
    include_once './conexao.php';

    $query_users = "SELECT id, nome, email, id_niveisacessos FROM usuarios WHERE id_niveisacessos = 1";
    $result_users = $conn->prepare($query_users);
    $result_users->execute();

    echo "<h2>Listar usuários com nível de acesso 1</h2>";
    while($row_user = $result_users->fetch(PDO::FETCH_ASSOC)){
        echo "ID" . $row_user['id'] . "<br>";
        echo "Nome:" . $row_user['nome'] . "<br>";
        echo "E-mail:" . $row_user['email'] . "<br>";
        echo "Niveis de acesso:" . $row_user['id_niveisacessos'] . "<br>";
        echo "<hr>";
    }
 
    echo "<hr>";

    $query_users_b = "SELECT id, nome, email, id_niveisacessos FROM usuarios WHERE email = 'eduardo.mayck22@gmail.com'";
    $result_users_b = $conn->prepare($query_users_b);
    $result_users_b->execute();

    echo "<h2>Listar usuários com email 'eduardo.mayck22@gmail.com' </h2>";
    while($row_users_b = $result_users_b->fetch(PDO::FETCH_ASSOC)){
        echo "ID" . $row_users_b['id'] . "<br>";
        echo "Nome:" . $row_users_b['nome'] . "<br>";
        echo "E-mail:" . $row_users_b['email'] . "<br>";
        echo "Niveis de acesso:" . $row_users_b['id_niveisacessos'] . "<br>";
        echo "<hr>";   
    }
   ?>
</body>
</html>
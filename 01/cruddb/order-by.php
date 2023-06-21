<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>TI - operadores and or</title>
</head>
<body>
    <?php
    include_once './conexao.php';

    $query_users = "SELECT id, nome, email 
    FROM usuarios 
    ORDER BY nome ASC";
    $result_users = $conn->prepare($query_users);
    $result_users->execute();

    while ($row_user = $result_users->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row_user['id'] . "<br>";
        echo "Nome: " . $row_user['nome'] . "<br>";
        echo "E-mail: " . $row_user['email'] . "<br>";
        echo "<hr>";
    }

    echo "<hr>";
    
    ?>
</body>

</html>
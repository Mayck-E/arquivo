<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>TI - operadores and or</title>
</head>
<body>
    <?php
    include_once './conexao.php';

    $query_users = "SELECT DISTINCT created
    FROM usuarios";
    $result_users = $conn->prepare($query_users);
    $result_users->execute();

    while ($row_user = $result_users->fetch(PDO::FETCH_ASSOC)) {
        echo "<br><br>";
        echo "Nível Acesso: " . $row_user['created'] . "<br>";
        echo "<hr>";
    }

    echo "<hr>";
    
    ?>
</body>

</html>
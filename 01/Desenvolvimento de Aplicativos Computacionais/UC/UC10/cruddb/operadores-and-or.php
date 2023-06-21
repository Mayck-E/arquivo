<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>TI - operadores and or</title>
</head>

<body>
    <?php
    include_once './conexao.php';

    echo "<h2>Listar usuários com duas condições - AND</h2>";
    $query_users = "SELECT id, nome, email, id_situsuarios, id_niveisacessos 
    FROM usuarios 
    WHERE id_situsuarios = 1 AND id_niveisacessos = 1";
    $result_users = $conn->prepare($query_users);
    $result_users->execute();

    while ($row_user = $result_users->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row_user['id'] . "<br>";
        echo "Nome: " . $row_user['nome'] . "<br>";
        echo "E-mail: " . $row_user['email'] . "<br>";
        echo "Situação do Usuário: " . $row_user['id_situsuarios'] . "<br>";
        echo "Nível de Acesso: " . $row_user['id_niveisacessos'] . "<br>";
        echo "<hr>";
    }

    echo "<h2>Listar usuários com condições - AND & OR</h2>";
    $query_users_b = "SELECT id, nome, email, id_situsuarios, id_niveisacessos 
    FROM usuarios 
    WHERE (id_situsuarios = 1 AND id_niveisacessos = 3) OR nome='Mayck'";
    $result_users_b = $conn->prepare($query_users_b);
    $result_users_b->execute();

    while ($row_user_b = $result_users_b->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row_user_b['id'] . "<br>";
        echo "Nome: " . $row_user_b['nome'] . "<br>";
        echo "E-mail: " . $row_user_b['email'] . "<br>";
        echo "Situação do Usuário: " . $row_user_b['id_situsuarios'] . "<br>";
        echo "Nível de Acesso: " . $row_user_b['id_niveisacessos'] . "<br>";
        echo "<hr>";
    }
    ?>
</body>

</html>
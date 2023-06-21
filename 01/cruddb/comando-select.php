<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TI- select</title>
</head>
<body>
    <?php
    //Chamar a conecção com o banco de dados
    include_once './conexao.php';

    //a query com "*" idica que deve trazer todas com as colunas
    $query_users = "SELECT * FROM usuarios";
    $result_users = $conn->prepare($query_users);
    $result_users->execute();

    //var_dump($result_users);

    echo "<h2>Listar usuários</h2>";
    while($row_user = $result_users->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_user);
        echo "ID" . $row_user['id'] . "<br>";
        echo "Nome:" . $row_user['nome'] . "<br>";
        echo "E-mail:" . $row_user['email'] . "<br>";
        echo "<hr>";
    }
 
    echo "<hr>";

    //Exemplo de query indicando quais colunas detronar valor
    $query_users_b = "SELECT id, nome, email, created FROM users";
    $result_users_b = $conn->prepare($query_users_b);
    $result_users_b->execute();

    echo "<h2>Listar usuários com data </h2>";
    while($row_users_b = $result_users_b->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_user_b);
        echo "ID" . $row_users_b['id'] . "<br>";
        echo "Nome:" . $row_users_b['nome'] . "<br>";
        echo "E-mail:" . $row_users_b['email'] . "<br>";
        echo "Data de cadasto: " . date('d/m/y H:i:s', strtotime($row_users_b['created'])) . "<br>";
        echo "<hr>";   
    }
   ?>
</body>
</html>
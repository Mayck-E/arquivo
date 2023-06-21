<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>TI - Insert</title>
</head>

<body>
    <?php
    include_once './conexao.php';

    $nome = "João";
    $email = "jo@joao.com.br";
    $senha = "123456";
    $id_situsuarios = "1";
    $id_niveisacessos = "3";

    //Atribuir o link e substituir o link com bindParam
    $query_user = "INSERT INTO usuarios 
    (nome, email, senha, id_situsuarios, id_niveisacessos, created) 
    VALUES (:nome, :email, :senha, :id_situsuarios, :id_niveisacessos, NOW())";
    $cad_user = $conn->prepare($query_user);

    $cad_user->bindParam(':nome', $nome, PDO::PARAM_STR);
    $cad_user->bindParam(':email', $email, PDO::PARAM_STR);
    $cad_user->bindParam(':senha', $senha, PDO::PARAM_STR);
    $cad_user->bindParam(':id_situsuarios', $id_situsuarios, PDO::PARAM_INT);
    $cad_user->bindParam(':id_niveisacessos', $id_niveisacessos, PDO::PARAM_INT);

    $cad_user->execute();

    var_dump($cad_user);
    //Função rowCount conta as linhas 
    if ($cad_user->rowCount()) {
        echo "Usuário cadastrado com sucesso!<br>";
    } else {
        echo "Erro: Usuário não cadastrado com sucesso!";
    }

    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TI - UPDATE</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <?php 
    include_once'./conexao.php';

    $nome = 'Edu';
    $email = 'edu@gmail.com';

    $query_user = "UPDATE usuarios SET nome=:nome, email=:email WHERE id=11";
    $up_user = $conn->prepare($query_user);

    $up_user->bindParam(':nome', $nome, PDO::PARAM_STR);
    $up_user->bindParam(':email', $email, PDO::PARAM_STR);

    if($up_user->execute()){
        echo "<br><br>Usuário(a) Alterado(a) com sucesso!";
    }else{
        echo "!!!Usuário(a) não Alterado(a) com sucesso!!!";
    }

    ?>
</body>
</html>
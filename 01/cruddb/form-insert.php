<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>TI - Formulário com INSERT</title>
</head>

<body>
    <h2>Cadastrar Usuário</h2>
    <?php
    include_once './conexao.php';

    //RECEBER DADOS DO FORMULÁRIO
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    var_dump($dados);

    if (!empty($dados['SendCadUser'])) {
        unset($dados['SendCadUser']);

        $query_user = "INSERT INTO usuarios (nome, email, senha, id_situsuarios, id_niveisacessos, created) VALUES (:nome, :email, :senha, :id_situsuarios, :id_niveisacessos, NOW())";
        $cad_user = $conn->prepare($query_user);

        $cad_user->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $cad_user->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $cad_user->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
        $cad_user->bindParam(':id_situsuarios', $dados['id_situsuarios'], PDO::PARAM_INT);
        $cad_user->bindParam(':id_niveisacessos', $dados['id_niveisacessos'], PDO::PARAM_INT);

    var_dump($cad_user);
        $cad_user->execute();

        if ($cad_user->rowCount()) {
            echo "Usuário cadastrado com sucesso!<br>";
        } else {
            echo "Erro: Usuário não cadastrado com sucesso!";
        }
    }

    ?>

    <form name="CadUser" action="" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Nome Completo" required><br><br>

        <label>E-mail:</label>
        <input type="email" name="email" placeholder="O melhor e-mail do usuário" required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" placeholder="Senha do Usuário" required><br><br>

        <label>Situação do Usuário:</label>
        <input type="number" name="id_situsuarios" placeholder="Situação do Usuário" required><br><br>

        <label>Nível de Acesso do Usuário:</label>
        <input type="number" name="id_niveisacessos" placeholder="Nível de Acesso do Usuário" required><br><br>

        <input type="submit" value="Cadastrar" name="SendCadUser">
    </form>
</body>

</html>
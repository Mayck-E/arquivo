<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TI - Formulário com UPDATE</title>
</head>

<body>
    <h2>Editar Usuário</h2>
    <?php
    include_once './conexao.php';

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

     

    if (!empty($dados['SendUpUser'])) {
        unset($dados['SendUpUser']);

        $query_user = "UPDATE usuarios SET nome=:nome, email=:email, senha=:senha, id_situsuarios=:id_situsuarios, id_niveisacessos=:id_niveisacessos WHERE id=:id";
        $up_user = $conn->prepare($query_user);

        $up_user->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $up_user->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $up_user->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
        $up_user->bindParam(':id_situsuarios', $dados['id_situsuarios'], PDO::PARAM_INT);
        $up_user->bindParam(':id_niveisacessos', $dados['id_niveisacessos'], PDO::PARAM_INT);
        $up_user->bindParam(':id', $dados['id'], PDO::PARAM_INT);
        if ($up_user->execute()) {
            echo "Usuário editado com sucesso!<br>";
        } else {
            echo "Erro: Usuário não editado com sucesso!";
        }

    }
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    $query_users = "SELECT id, nome, email, senha, id_situsuarios, id_niveisacessos FROM usuarios WHERE id=:id";
    $result_user = $conn->prepare($query_users);
    $result_user->bindParam(':id', $id, PDO::PARAM_INT);
    $result_user->execute();
    $row_user = $result_user->fetch(PDO::FETCH_ASSOC);
    ?>

    <form name="UpUser" action="" method="POST">
        <input type="hidden" name="id" value="<?php
        if ($row_user['id']) {
            echo $row_user['id'];
        } 
        ?>">

        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Nome Completo" value="<?php
        if (isset($dados['nome'])) {
            echo $dados['nome'];
        } else if ($row_user['nome']) {
            echo $row_user['nome'];
        } ?>"

         required><br><br>

        <label>E-mail:</label>
        <input type="email" name="email" placeholder="O melhor e-mail do usuário" value="<?php
        if (isset($dados['email'])) {
            echo $dados['email'];
        } else if ($row_user['email']) {
            echo $row_user['email'];
        } 
        ?>"

        required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" placeholder="Senha do Usuário" required><br><br>

        <label>Situação do Usuário:</label>
        <input type="number" name="id_situsuarios" placeholder="Situação do Usuário" value="<?php
        if (isset($dados['id_situsuarios'])) {
            echo $dados['id_situsuarios'];
        } else if ($row_user['id_situsuarios']) {
            echo $row_user['id_situsuarios'];
        } 
        ?>"

        required><br><br>

        <label>Nível de Acesso do Usuário:</label>
        <input type="number" name="id_niveisacessos" placeholder="Nível de Acesso do Usuário" value="<?php
        if (isset($dados['id_niveisacessos'])) {
            echo $dados['id_niveisacessos'];
        } else if ($row_user['id_niveisacessos']) {
            echo $row_user['id_niveisacessos'];
        } 
        ?>"

         required><br><br>

        <input type="submit" value="Salvar" name="SendUpUser">
    </form>
</body>

</html>












<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>TI - </title>
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

        <!-- Pesquisar no banco de dados as situações -->
        <?php
        $query_sits_user = "SELECT id, nome FROM sit_usuarios ORDER BY nome ASC";
        $result_sits_users = $conn->prepare($query_sits_user);
        $result_sits_users->execute();
        ?>
        <label>Situação do Usuário:</label>
        <select name="id_situsuarios" required>
            <option value="">Selecione</option>
            <?php
            while ($row_sits_user = $result_sits_users->fetch(PDO::FETCH_ASSOC)) {
                $selec_sits_user = "";
                if (isset($dados['id_situsuarios']) and ($dados['id_situsuarios'] == $row_sits_user['id'])) {
                    $selec_sits_user = "selected";
                }
            }
            echo "<option value='" . $row_sits_user['id'] . "' $selec_sits_user>" . $row_sits_user['nome'] . "</option>";
            ?>
        </select><br><br>
        <?php

        $query_niveis_acessos = "SELECT id, nome FROM niveis_acessos ORDER BY nome ASC";
        $result_niveis_acessos = $conn->prepare($query_niveis_acessos);
        $result_niveis_acessos->execute();
        ?>
        <label>Niveis de Acesso do Usuário:</label>
        <select name="id_niveisacessos" required>
            <option value="">Selecione</option>
            <?php
            while ($row_niveis_acessos = $result_niveis_acessos->fetch(PDO::FETCH_ASSOC)) {
                $selec_niveis_acessos = "";
                if (isset($dados['id_niveisacessos']) AND ($dados['id_niveisacessos'] == $row_niveis_acessos['id'])) {
                    $selec_niveis_acessos = "selected";
                }
            }
            echo "<option value='" . $row_niveis_acessos['id'] . "' $selec_niveis_acessos>" . $row_niveis_acessos['nome'] . "</option>";
            ?>

        </select>

    </form>
</body>

</html>
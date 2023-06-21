<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Mayck">
    <link rel="icon" href="imagens/icone.ico">  
    <title>Adm - Cadastrar usuários</title>
    <!-- linkando o boostratp -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <!-- linkando o css -->
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <br /><br /><br />

    <h1> Cadastrar Usuários </h1>
    <br /><br />

    <form method="POST" action="processa_php/cadastra.php">
        <div class="form-group">
            <label class="lbl">Nome</label>
            <div class="container">
                <input type="text" class="form-control" name="nome">
            </div>
        </div>

        <div class="form-group">
            <label  class="lbl">E-mail</label>
            <div class="container">
                <input type="email" class="form-control" name="email">
            </div>
        </div>       

        <div class="form-group">
            <label  class="lbl">Senha</label>
            <div class="container">
                <input type="password" class="form-control" name="senha">
            </div>
        </div>

        <div class="form-group">
            <label  class="lbl">Situação do usuário</label>
            <div class="container">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                 name="id_situsuarios">
                    <option value="1">Ativo</option>
                    <option value="2">Inativo</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label  class="lbl">Níveis de acesso</label>
            <div class="container">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                 name="id_niveisacessos">
                    <option value="1">Aluno</option>
                    <option value="2">Professor</option>
                    <option value="3">Diretor</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
    <br />
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
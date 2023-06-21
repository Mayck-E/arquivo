<?php
    require_once("./conexao/db.php");      
    $usuario = [];

    $id = filter_input(INPUT_GET,'id');
    

    if($id){
    $sql = $conn ->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql -> bindValue(':id', $id);  //vai carregar o id
    $sql -> execute();       

    if($sql-> rowCount() > 0){
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    }    
   }    
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Fábio">
    <link rel="icon" href="imagens/icone.ico">  
    <title>Adm - Editar usuários</title>
    <!-- linkando o css -->
    <link rel="stylesheet" href="./css/sytle.css">
    <!-- linkando o boostratp -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

</head>

<body>
    <br /><br /><br />

    <h1> Editar Usuários </h1>
    <br /><br />

    <form method="POST" action="processa_php/edita.php">
        <div class="form-group">
            <label class="lble">Nome</label>
            <div class="container">
                <input type="text" class="form-control" name="nome" 
                value="<?php echo  $usuario['nome']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="lble">E-mail</label>
            <div class="container">
                <input type="email" class="form-control" name="email" 
                value="<?php echo  $usuario['email']; ?>">
            </div>
        </div>        

        <div class="form-group">
            <label class="lble">Senha</label>
            <div class="container">
                <input type="password" class="form-control" name="senha" 
                value="<?php echo  $usuario['senha']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="lble">Situação de usuário</label>
            <div class="container">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id_situsuarios">
                    
                    <option value="1">Ativo</option>
                    <option value="2">Inativo</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="lble">Níveis de acesso</label>
            <div class="container">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="id_niveisacessos">
                    
                    <option value="1">Administrativo</option>
                    <option value="2">Usuário</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="container">
                <input type="hidden" class="form-control" name="id" 
                value="<?php echo  $usuario['id']; ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Editar</button>
    </form>

    <br />

    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
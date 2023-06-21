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
    <meta name="author" content="Mayck">
    <link rel="icon" href="imagens/icone.ico">
    <title>Dashboard - ADM</title>
    <!-- lincando o bootstrap -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

</head>

<body>
    <input type="hidden" class="form-control" name="id" value="<?php echo  $usuario['id']; ?>">

    <!-- inicio do codigo bootstrap - components dropdown -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">DASHBOARD - ADM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" data-bs-controls="#navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Usuário
                        </a>
                    
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="listar.php">
                                listar</a></li>
                        <li><a class="dropdown-item" href="cadastrar.php">
                                Cadastrar</a></li>
                    </ul>
                    </li>
                    <a class="nav-link" aria-current="page" href="sair.php">Sair</a>
                    <a class="nav-link" aria-current="page" href="#"> | <?php echo $usuario['nome'];?></a>
                </ul>

            </div>
        </div>
    </nav>

    <!-- fim do bloco dropdown   -->
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
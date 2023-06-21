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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Fábio">
    <link rel="icon" href="imagens/icone.ico">
    <title>Dashboard - USUÁRIO</title>
    <!-- linkando o bootstrap -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

  </head>
  <body>
  <input type="hidden" class="form-control" name="id" value="<?php echo  $usuario['id']; ?>"> 
  <!-- início do código do bootstrap - components dropdown -->
  <nav class="navbar navbar-expand-lg navbar-secondary bg-secondary">
  <div class="container-fluid">
    <a class="navbar-brand">DASHBOARD - USUÁRIO</a>
    <button class="navbar-toggler" type="button" data-bs-toggl="collapse"
    data-bs-target="#navbarNavDarkDropdown"
    aria-controls="navbarNavDarkDropdown" aria-expanded="false"
    aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#"
          id="navbarDarkDropdownMenuLink" role="button"
          data-bs-toggle="dropdown" aria-expanded="false">
            Usuário
          </a>
          <ul class="dropdown-menu dropdown-menu-secondary"
           aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="listarUser.php">
                Listar</a></li>
          </ul>
        </li>

      <a class="nav-link" aria-current="page" href="sair.php">Sair</a>
      <a class="nav-link" aria-current="page" href="#"> | <?php echo $usuario['nome'];?></a>
      </ul>
    </div>
  </div>
</nav>
<!-- fim do bloco dropdown -->
<script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
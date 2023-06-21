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
    <title>Adm - Visualizar usuários</title>   
    <!-- linkando o boostratp --> 
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="./css/sytle.css">  
    
  </head>
  <body>
        
    <h1> Visualizar Usuários </h1>
    <br /><br />
    
      <div class="row">    
         <div class="col-md-6">
         <table class="tabela">
         <tr>           
           <td><b>Id: </b></td>           
           <td> <?php echo $usuario['id']; ?> </td>          
          </tr>   
          
          <tr>
            <td><b> Nome: </b></td>
            <td> <?php echo $usuario['nome']; ?> </td>
          </tr>

          <tr>
            <td><b> E-mail: </b></td>
            <td> <?php echo $usuario['email']; ?> </td>
          </tr>

          <tr>
            <td><b> Situação do usuário: </b></td>
            <td> <?php echo $usuario['id_situsuarios']; ?> </td>
          </tr>  
          
          <tr>
            <td><b> Níveis de Acesso: </b></td>
            <td> <?php echo $usuario['id_niveisacessos']; ?> </td>
          </tr>          
                
           </table>
           <form action="listar.php">
           <button type="submit" class="btn btn-primary">Listar</button>
           </form>
         </div>         
      </div>   

      <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>   

</body>
</html>
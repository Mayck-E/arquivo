 <?php
require_once("./conexao/db.php"); 
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Fábio">
    <link rel="icon" href="imagens/icone.ico">
    <title>Adm - Listagem de Usuários</title>
    <!-- lincando o bootstrap -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <!-- lincando o CSS -->
    <link href="./css/style.css" rel="stylesheet">
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

<?php
      $sql = $conn->prepare("SELECT * FROM usuarios ORDER BY 'id'");   
      $sql->execute();        
    ?>
   
        <br /><br /><br />
    <!-- início do código do bootstrap - content tables -->
    <h1> Listagem de Usuários </h1>
        <br />
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">SITUAÇÃO USUARIO</th>
                <th scope="col">NÍVEIS DE ACESSO</th>
                </tr>
            </thead>
            
            <tbody>
            <?php
                //enquanto linhas for = ao array arnazenado no resultado da consulta faça
                while($linhas = $sql->fetch(PDO::FETCH_ASSOC)){
                  echo "<tr>";
                  echo "<td>".$linhas['id']."</td>";
                  echo "<td>".$linhas['nome']."</td>";
                  echo "<td>".$linhas['email']."</td>";
                  echo "<td>".$linhas['id_situsuarios']."</td>";
                  echo "<td>".$linhas['id_niveisacessos']."</td>";                 
                                         
                  echo "</tr>";                  
                }
              ?>         
             
            </tbody>
    </table>
  <!-- fim do  content tables -->      

  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>

      
  </body>

</html>
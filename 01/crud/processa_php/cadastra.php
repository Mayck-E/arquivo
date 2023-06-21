<?php
require_once("../conexao/db.php");   

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sits_user_id = $_POST['id_situsuarios'];
$niveis_acesso_id = $_POST['id_niveisacessos'];

$sql = $conn -> prepare("INSERT INTO usuarios (nome, email, senha, id_situsuarios, 
id_niveisacessos, created) 
VALUES ('$nome', '$email', '$senha', '$sits_user_id', '$niveis_acesso_id', NOW())");
$sql -> execute();

 if($sql){
    echo "      
    <META  HTTP-EQUIV=REFRESH CONTENT = '0;URL=
    http://localhost/crud/listar.php'>
    <script type=\"text/javascript \">
      alert(\"Usuário cadastrado com sucesso!\");
    </script>          
    ";          
}

else { 
    echo "
    <META  HTTP-EQUIV=REFRESH CONTENT = '0;URL=
    http://localhost/crud/listar.php'>
    <script type=\"text/javascript \">
      alert(\"Usuário não cadastrado!\");
    </script>          
    ";          
} 
?>
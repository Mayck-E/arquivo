<?php
require_once("../conexao/db.php");

$id = filter_input(INPUT_POST,'id');
$nome = filter_input(INPUT_POST,'nome');
$email = filter_input(INPUT_POST,'email');
$senha = filter_input(INPUT_POST,'senha');
$id_situsuarios = filter_input(INPUT_POST,'id_situsuarios');
$id_niveisacessos = filter_input(INPUT_POST,'id_niveisacessos');

 if($id && $nome && $email && $senha && $id_situsuarios && $id_niveisacessos){
  $sql = $conn ->prepare("UPDATE usuarios SET nome=:nome, email=:email, senha=:senha,
  id_situsuarios=:id_situsuarios, id_niveisacessos=:id_niveisacessos WHERE id=:id ");
  $sql->bindValue(':nome', $nome);  //bindValue carrega os dados
  $sql->bindValue(':email', $email);
  $sql->bindValue(':senha', $senha);
  $sql->bindValue(':id_situsuarios', $id_situsuarios);
  $sql->bindValue(':id_niveisacessos', $id_niveisacessos);
  $sql->bindValue(':id', $id);
  $sql -> execute();
  echo "      
        <META  HTTP-EQUIV=REFRESH CONTENT = '0;URL=
        http://localhost/crud/listar.php'>
        <script type=\"text/javascript \">
        alert(\"Usuário alterado com sucesso!\");
        </script>          
        ";  
 }else{
  echo "      
        <META  HTTP-EQUIV=REFRESH CONTENT = '0;URL=
        http://localhost/crud/listar.php'>
        <script type=\"text/javascript \">
        alert(\"Usuário não alterado!\");
        </script>          
        ";  
 }

 ?>
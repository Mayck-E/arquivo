<?php 

//Conexão o banco de dados
include_once './conexao.php';

$id = 2;

$query_user = "DELETE FROM usuarios WHERE id=:id";
$delete_user = $conn->prepare($query_user);
$delete_user->bindParam(':id', $id, PDO::PARAM_INT);

if($delete_user->execute()){
    echo "Usuario apagado com sucesso!";
}else{
    echo "Erro: Usuario nao apagado com sucesso!";
}
?>
<?php 
session_start();

//conexao com o banco de dados
include_once './conexao.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$query_user = "DELETE FROM usuarios WHERE id=:id";
$delete_user = $conn->prepare($query_user);
$delete_user->bindParam(':id', $id, PDO::PARAM_INT);

if($delete_user->execute()){
    $_SESSION['msg'] = "<p style='color: green;'>Usuario excuido com sucesso!</p>";
    header("Location: delete-list-user.php");
}else{
    $_SESSION['msg'] = "<p style='color: red;'>Erro: Usuario não foi excuido com sucesso!</p>";
    header("Location: delete-list-user.php");
}
?>
<?php
require_once("../conexao/db.php");  

$id = filter_input(INPUT_GET,'id');

$sql = "DELETE FROM usuarios WHERE id=:id";
$delete_user = $conn->prepare($sql);
$delete_user->bindParam(':id', $id, PDO::PARAM_INT);
$delete_user -> execute();

if($delete_user){
    echo "      
    <META  HTTP-EQUIV=REFRESH CONTENT = '0;URL=
    http://localhost/crud/listar.php'>
    <script type=\"text/javascript \">
    alert(\"Usuário apagado com sucesso!\");
    </script>          
    ";  
}else{
    echo "      
        <META  HTTP-EQUIV=REFRESH CONTENT = '0;URL=
        http://localhost/crud/listar.php'>
        alert(\"Não foi possível apagar o usuário!\");
        </script>          
        ";  
}

?>
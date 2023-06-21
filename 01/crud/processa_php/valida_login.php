<?php
  session_start();
  require_once("../conexao/db.php");    
  $email = ($_POST['email']);
  $senha = ($_POST['senha']);

  $sql = $conn -> prepare("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
  $sql->execute([$email, $senha]);
  $result = $sql ->rowCount(); 
      
  if($result == 1){  
    while($row_user = $sql->fetch(PDO::FETCH_ASSOC))
   
    if($row_user['id_niveisacessos'] == 2 || $row_user['id_niveisacessos'] == 3){
    header('Location: /crud/area_adm.php?id=' . $row_user['id'] . '');   

  }else{  

    header('Location: /crud/area_usuario.php?id=' . $row_user['id'] . '');
    }
  }else {    
    echo "
    <META  HTTP-EQUIV=REFRESH CONTENT = '0;URL=
    http://localhost/crud/index.php'>
    <script type=\"text/javascript \">
      alert(\"Usuário ou senha inválidos ou inexistente!\");
    </script>          
    ";         
    
  }    
?>
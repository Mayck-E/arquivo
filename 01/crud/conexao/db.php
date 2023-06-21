<?php
//Criar variáveis para inserir os parâmetros
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "cruddb";
$port = 3306;

//Tratar o erro com o try - catch
try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);    
    //echo "Conexão com o banco de dados realizado com sucesso!";
} catch (PDOException $err) {
    echo "Erro: Conexão com o banco de dados não foi realizada 
    com sucesso. Erro gerado " . $err->getMessage();
}
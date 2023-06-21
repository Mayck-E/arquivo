<?php

//Criar variáveis para inserir os parametros
$host = "localhost";
$user = "root";
$pass ="";
$dbname = "cruddb";
$port = 3306;

// Tratar o erro como tru - catch
try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    //$conn = new PDO('mysql:host=' . $host . ':port=' . $port . ':dbname=' . $dbname, use)
    echo "Conexão com o banco de dados realizado com sucesso!";
} catch(PDOException $err) {
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado" . $err->getMessage();
}
<?php
require_once("connection.php");

$Nome = $_POST["Nome"];
$Funcao = $_POST["Funcao"];

$conn = new Connection();
$pdo = $conn -> Connect();
$stmt = $pdo->prepare("INSERT INTO funcionarios(Nome, Função) VALUES(:Nome,:Funcao)");

$stmt ->bindParam(':Nome', $Nome,PDO::PARAM_STR);
$stmt ->bindParam(':Funcao', $Funcao,PDO::PARAM_STR);

try{
    $stmt->execute();
    echo json_encode(array("Status"=>"OK"));
    
}catch(Exception $e){
   echo (array("Status"=>$e));
    // echo $e;
}
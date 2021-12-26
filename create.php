<?php
require_once "connection.php";

$usuario = $_POST["user"];
$senha = $_POST["password"];

$con = new Connection();
$pdo = $con ->Connect();
$stmt = $pdo ->prepare("INSERT INTO  users(username,password) values(:userr,:pass)");


$senha = md5($senha);
$stmt ->bindParam(':userr',$usuario,PDO::PARAM_STR);
$stmt ->bindParam(':pass',$senha,PDO::PARAM_STR);

try{
    $stmt ->execute();
    echo json_encode(array('Usuario Criado' =>$usuario));

}catch(PDOException $e){
   // echo $e;
   echo json_encode(array('Erro' =>$e));
}



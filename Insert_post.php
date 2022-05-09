<?php
require ("connection.php");
session_start();
// $autor = $_POST['autor'];
$autor = $_SESSION['nome'];  //come from auth.php
// $data = $_POST['data']; 
$data = date("Y/m/d");
$obra = $_POST['obra'];
$texto = $_POST['texto'];
// $obs = $_POST['obs'];
$obs = "";
$fotos = "1";
// $autor = "Leo";
// $data = "25/04/2022";
// $obra = "Ed.Europa";
// $texto = "Primeiro Post funcional";
// $obs =" nenhuma";



$connection = new Connection();
$pdo = $connection->Connect();
$stmt = $pdo->prepare("INSERT INTO `diario_obra`(`id`, `autor`, `data`, `obra`, `texto`, `obs`, `fotos`) 
VALUES (NULL,:autor,:data,:obra,:texto,:obs,:fotos)");

$stmt ->bindParam(':autor', $autor,PDO::PARAM_STR);
$stmt ->bindParam(':data', $data,PDO::PARAM_STR);
$stmt ->bindParam(':obra', $obra,PDO::PARAM_STR);
$stmt ->bindParam(':texto', $texto,PDO::PARAM_STR);
$stmt ->bindParam(':obs', $obs,PDO::PARAM_STR);
$stmt ->bindParam(':fotos', $fotos,PDO::PARAM_STR);

try{
    $stmt ->execute();
    echo "Postado";
    header("location:Feed.php");
}catch(Exception $e){
    echo "Error: " . $e;
}

// $txt = $_POST["diario_post"];

// var_dump(nl2br($txt));


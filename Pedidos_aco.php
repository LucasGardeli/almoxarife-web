<?php
require_once "connection.php";

try{

$conn = new Connection();
$pdo = $conn -> Connect();
$stmt = $pdo ->prepare("SELECT * FROM pedidos_aco");
$stmt->execute();

}catch(PDOException $e){
    echo $e;
}


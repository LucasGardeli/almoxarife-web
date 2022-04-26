<?php
require_once("connection.php");

// $Nome = $_POST["Nome"];
// $Funcao = $_POST["Funcao"];
// $Horas = $_POST["Horas"];
$Nome = "José Lucio";
$Horas = 10;
$Horas_Total = 0;

$conn = new Connection();
$pdo = $conn-> Connect();
$stmt = $pdo->prepare("SELECT * FROM hora_extra where Nome=:nome");
$stmt ->bindParam(":nome",$Nome,PDO::PARAM_STR);
// $stmt = $pdo ->prepare("UPDATE hora_extra Set Horas=:horas where Nome = :nome");

// $stmt->bindParam(":horas",$Horas,PDO::PARAM_INT);
// $stmt->bindParam(':nome',$Nome,PDO::PARAM_STR);

try{
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $Horas_Total = $result['Horas'] + $Horas;
        echo $Horas_Total;
        Update($Horas_Total);
       
        // echo $result['Nome'];
        // echo (int)$result['Horas'] + (int)$Horas;
    }
}catch(PDOException $e){
    echo $e;
    
}

function Update($hora_total){
    $pdo = $conn->Connect();
    $stmt = $pdo ->prepare("UPDATE hora_extra Set Horas=:hora_total where Nome=:nome");
    $stmt ->bindParam(':hora_total',$hora_total,PDO::PARAM_INT);
    try{
        $stmt->execute();
        echo "Hora Extra atualizada ". $Nome ."";
    }catch(PDOException $e){
        echo $e;
    }
   

}

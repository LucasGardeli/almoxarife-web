<?php
require_once "connection.php";

$Nome = $_POST["Nome"];
$Empresa = $_POST["Empresa"];
$Ferramenta = $_POST["Ferramenta"];
$Data = $_POST["Data"];
$Devolveu = 0;

$con = new Connection();
$pdo = $con ->Connect();
$stmt = $pdo ->prepare("INSERT INTO  almoxarifado_ferramentas(Nome,Empresa,Ferramenta,Data,Devolveu) values(:Nome,:Empresa,:Ferramenta,:Data,:Devolveu)");


//$senha = md5($senha);
$stmt ->bindParam(':Nome',$Nome,PDO::PARAM_STR);
$stmt ->bindParam(':Empresa',$Empresa,PDO::PARAM_STR);
$stmt ->bindParam(':Ferramenta',$Ferramenta,PDO::PARAM_STR);

if($Data==""){
    $Data = date("Y/m/d");
    $stmt ->bindParam(':Data',$Data,PDO::PARAM_STR);
    
}else{
    $stmt ->bindParam(':Data',$Data,PDO::PARAM_STR);
}

$stmt ->bindParam(':Devolveu',$Devolveu,PDO::PARAM_INT);



try{
    $stmt ->execute();
    echo json_encode(array('Indice Inserido' =>$Nome));
    header("location:tools.php");

}catch(PDOException $e){
   // echo $e;
   echo json_encode(array('Erro' =>$e));
}



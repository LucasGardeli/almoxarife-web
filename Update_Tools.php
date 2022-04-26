<?php

require_once "connection.php";

$comeFrom="";
$nome="";

if($_POST["id"]){
    $id = $_POST["id"];
    $comeFrom ="toolspage";
}
if($_POST['id_search']){
    $id = $_POST["id_search"];
    $comeFrom ="searchpage";
}



$con = new Connection();
$pdo = $con->Connect();

$stmt = $pdo->prepare("SELECT Nome from Almoxarifado_ferramentas where id=:id");
$stmt->bindParam(':id',$id,PDO::PARAM_INT);

try{
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $Nome = $row['Nome'];
}catch(PDOException $e){
    echo json_encode(array('Erro' =>$e));
}



$stmt = $pdo->prepare("UPDATE almoxarifado_ferramentas SET Devolveu=1 where id=:id");
$stmt ->bindParam(':id',$id,PDO::PARAM_INT);

try{
    $stmt ->execute();
    echo json_encode(array('Indice Atualizado' =>$id));
    switch($comeFrom){
        case "toolspage":
            header("location:tools.php");
            break;
        case "searchpage":
            header("location:search_name.php?Nome=$Nome");
            break;   
    }
   
}catch(PDOException $e){
   // echo $e;
   echo json_encode(array('Erro' =>$e));
}



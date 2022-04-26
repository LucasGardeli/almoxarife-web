<?php
require_once ("../connection.php");
$Emitente = $_POST['Emitente'];
$Numero = $_POST['Numero'];
$Emissao = $_POST['Emissão'];
$Vencimento = $_POST['Vencimento'];
$Valor = $_POST['Valor'];
$Obra = $_POST['Obra'];
$Valor = $_POST['Valor'];


$conn = new Connection();
$pdo = $conn -> Connect();
// $stmt = $pdo ->prepare("INSERT INTO 'nota_fiscal_log' 
// ('id','Emitente','Numero','Data_Emissão','Data_Vencimento','Valor','Obra','Obs') 
// VALUES(NULL,'leo\r\n','1212','23/02','25/04','1.252,00','Europa','nenhuma')");

$stmt = $pdo ->prepare("INSERT INTO `nota_fiscal_log` 
(`id`, `Emitente`,Numero, `Data_Emissão`, `Data_Vencimento`, `Valor`, `Obra`,`Obs`) 
VALUES (NULL, 'CB Marques','123', '21/02','','656','Ed.Europa','')");

// INSERT INTO `nota_fiscal_log`
//  (`id`, `Emitente`, `Numero`, `Data_Emissão`, `Data_Vencimento`, `Valor`, `Obra`, `Obs`)
//   VALUES (NULL, 'CB marques\r\n', '32323', '21/02/22', '', '65.254,75', 'Ed.Europa', '');

//  $stmt = $pdo ->prepare("INSERT INTO  almoxarifado_ferramentas(Nome,Empresa,Ferramenta,Data,Devolveu)
//   values(:Nome,:Empresa,:Ferramenta,:Data,:Devolveu)");


try{
    $stmt->execute();
}catch(Exception $e){
    echo $e;
}
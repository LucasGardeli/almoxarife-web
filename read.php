<?php
require_once "connection.php";
$con = new Connection();
$pdo = $con->Connect();
$stmt =$pdo->prepare("SELECT * FROM almoxarifado_ferramentas");
$stmt->execute();
?>

<DOCTYPE html>
    <head>
        <link rel="stylesheet" href="toolscss.css">  
        <title>Ferramentas em USO</title>
    </head>
    <body>
  
<table class="table-tools">
<tr>
    <thead>
    <th>NOME</th>
    <th>EMPRESA</th>
    <th>FERRAMENTA</th>
    <th>DATA</th>
    <th>DEVOLVEU</th>
    </tr>
    </thead>

   

<?php
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $rows[] = $row;
    echo"<tr>";  
        echo "<td>" .$row['Nome']. "</td>";
        echo "<td>" .$row['Empresa']. "</td>";
        echo "<td>" .$row['Ferramenta']. "</td>";
        echo "<td>" .$row['Data']. "</td>"; 
        if($row['Devolveu']==0){
            echo "<td class='tdnot'>"."NÃO"."</td>";  
        }else{
            echo "<td class='tdyes'>"."SIM"."</td>"; 
        }
        
      
   echo"</tr>";
}
?>
  

    
</table>
    </body>





<?php
//echo json_encode($rows);
?>

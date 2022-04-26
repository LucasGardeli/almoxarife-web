<?php
require_once "connection.php";

$nome= $_GET["Nome"];
$con = new Connection();
$pdo = $con->Connect();
$stmt =$pdo->prepare("SELECT * FROM almoxarifado_ferramentas where Nome LIKE CONCAT(:nome,'%')");

$stmt->bindParam(":nome",$nome,PDO::PARAM_STR);
$stmt->execute();
?>

<!DOCTYPE html>
    <head>       
        <script defer src="css/fontawesome/js/all.js"></script>     
        <link rel="stylesheet" href="css/tools_page.css">  
        <title>Ferramentas</title>

    </head>
    <body>
  
 <container class="main">
    
     


 <div id="InsertModal" class="modal">
<!-- Modal content -->
<div class="modal-content">
    <header>
        <Span>Novo Indice</Span>
        <span id="close"><i class="fas fa-window-close"></i></span>
    </header>
  
  <form class="InsertForm"  method="post" action="Insert_tool.php">
        <input class="InsertInput" id="Nome" type="text" name=Nome placeholder="Nome">
        <input class="InsertInput" type="text" name="Empresa" list="Company" placeholder="Empresa">
        <datalist id="Company" class="InsertInput">
          <option value="Araújo Simão">  
          <option value="ICKR">
        </datalist>
        
        <input class="InsertInput" type="text" name="Ferramenta" placeholder="Ferramenta">
        <input class="InsertInput" id="Data" type="date" name="Data" placeholder="Data" autocomplete="on">
        <button type="submit">Inserir</button>
        
    </form>
</div>

</div> 

    <div>
        <div class="ActionBar"> 
            <form action="search_name.php" method="get">
                <input type="text" name="Nome" class="SearchBar" placeholder="Pesquisar Nome">
                <button type="submit" class="SearchBtn"><i class="fas fa-search"></i></button>
                <button type="button" id="InsertBtn" class="InsertBtn">Inserir</button>
            </form>          
        </div>   
                
                <form method="post" action=Update_Tools.php class="TableForm">

        
                    <div class="TablePanel">
                       <table class="table-tools">  
                           <thead>
                                   <th class="ID">ID</th>
                                   <th class="large">NOME</th>
                                   <th class="mid">EMPRESA</th>
                                   <th class="mid">FERRAMENTA</th>
                                   <th class="mid">DATA</th>
                                   <th class="status">DEVOLVEU</th>
                                   <th>AÇÕES</th> 
                           </thead>
                           
                       <?php
                       while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                           $rows[] = $row;
                           echo"<tr>";  
                               echo"<td class='id-column'>" .$row['id']. "</td>";
                               echo "<td>" .$row['Nome']. "</td>";
                               echo "<td>" .$row['Empresa']. "</td>";
                               echo "<td>" .$row['Ferramenta']. "</td>";
                               echo "<td>" .$row['Data']. "</td>"; 
                               if($row['Devolveu']==0){
                                   echo "<td class='tdnot'>"."Não"."</td>"; 
                                   echo "<td><button class=action type='submit' name=id_search value=" .$row['id']. ">Finalizar</button></td>";
                               }else{
                                   echo "<td class='tdyes'>"."Sim"."</td>"; 
                               }
                               
                             
                          echo"</tr>";
                       }
                       ?>
                         
                       
                           
                       </table>
                    </div>
                
                   </form>
           
             
         </div>

  

   
       
 </container>       
 <script src="script.js"></script>   
    </body>





<?php
//echo json_encode($rows);
?>

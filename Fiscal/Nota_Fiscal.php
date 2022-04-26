<?php
require_once("../connection.php");
$con = new Connection();
$pdo = $con->Connect();
$stmt =$pdo->prepare("SELECT * FROM nota_fiscal_log");
$stmt->execute();
?>

<!DOCTYPE html>
    <head>       
        <script defer src="../css/fontawesome/js/all.js"></script>     
        <link rel="stylesheet" href="Fiscal_style.css">  
        <title>Araújo Simão</title>
    </head>
    <body>
  
 <container class="main"> 
   
 <div id="InsertModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
    <header>
        <Span>Lançar Nota</Span>
        <span id="close"><i class="fas fa-window-close"></i></span>
    </header>
  
  <form class="InsertForm"  method="post" action="Insert_Nota.php">
        <input class="InsertInput" id="Nome" type="text" name=Emitente placeholder="Emitente">
        <input class="InsertInput" type="text" name="Numero" placeholder="Numero NF">
        <input class="InsertInput" type="date" name="Data_Emissão" placeholder="Emissão">
        <input class="InsertInput" type="date" name="Data_Vencimento" placeholder="Vencimento">
        <Input class="InsertInput" type="text" name="Valor" placeholder="Valor">
        <Input class="InsertInput type="text" name="Obra" placeholder="Obra">   
        <button type="submit">Inserir</button>
        
    </form>
    </div>

    </div> 

    <div>
        <div class="ActionBar"> 
            <form action="Insert_Nota.php" method="get">
                <input type="text" name="Nome" class="SearchBar" placeholder="Pesquisar Nome">
                <button type="submit" class="SearchBtn"><i class="fas fa-search"></i></button>
                <button type="button" id="InsertBtn" class="InsertBtn">Inserir</button>
            </form>          
        </div>   
                
                <form method="post" action=Atualizar_Nota.php class="TableForm">        
                    <div class="TablePanel">
                       <table class="table-tools">  
                           <thead>
                                   <th class="ID">ID</th>
                                   <th class="large">Emitente</th>
                                   <th class="mid">Numero NF</th>
                                   <th class="mid">Emissão</th>
                                   <th class="mid">Vencimento</th>
                                   <th class="mid">Valor</th>
                                   <th>Ações</th> 
                           </thead>
                           
                       <?php
                       while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                           $rows[] = $row;
                           echo"<tr>";  
                               echo"<td class='id-column'>" .$row['id']. "</td>";
                               echo "<td>" .$row['Emitente']. "</td>";
                               echo "<td>" .$row['Numero']. "</td>";
                               echo "<td>" .$row['Data_Emissão']. "</td>";
                               echo "<td>" .$row['Data_Vencimento']. "</td>"; 
                               echo "<td>" .$row['Valor']. "</td>";
                               /*if($row['Devolveu']==0){
                                   echo "<td class='tdnot'>"."Não"."</td>"; 
                                   echo "<td><button class=action type='submit' name=id value=" .$row['id']. ">Finalizar</button></td>";
                               }else{
                                   echo "<td class='tdyes'>"."Sim"."</td>"; 
                               }
                               */
                             
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

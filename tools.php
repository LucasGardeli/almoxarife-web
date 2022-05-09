<?php
require_once "connection.php";
session_start();

if(array_key_exists('pag',$_SESSION)){
    $pag = $_SESSION['pag'];

}else{
    $_SESSION['pag'] =1;
    $pag = $_SESSION['pag'];
}

if(isset($_POST['Inicio'])){
    $_SESSION['pag'] =1;
    $pag = $_SESSION['pag'];
}

if(isset($_POST['Proximo'])){
    $_SESSION['pag']+=1;
    $pag = $_SESSION['pag'];
}

 if(isset($_POST['Anterior'])){
     if($_SESSION['pag']>1){
     $_SESSION['pag']-=1;
     $pag = $_SESSION['pag'];
 }}


$limit=$pag * 60;
$offset=$limit - 60;



$con = new Connection();
$pdo = $con->Connect();
$stmt =$pdo->prepare("SELECT * FROM almoxarifado_ferramentas");
$stmt->execute();


if(!$_SESSION['usuario']){
    // header('location:index.html');
}


?>

<!DOCTYPE html>
    <head>       
        <script defer src="css/fontawesome/js/all.js"></script>     
        <link rel="stylesheet" href="css/tools_page.css">  
        <title>Ferramentas</title>
    </head>
    <body>
        <?php require "header.php"; ?> 
  
 <container class="main"> 
   
 <div id="InsertModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
    <header>
        <Span>Novo Indice</Span>
        <span id="close"><i class="fas fa-window-close"></i></span>
    </header>
  
  <form class="InsertForm"  method="post" action="Insert_Tool.php">
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
            <form action="Search_Name.php" method="get">
                <input type="text" name="Nome" class="SearchBar" placeholder="Pesquisar Nome">
                <button type="submit" class="SearchBtn"><i class="fas fa-search"></i></button>
                <button type="button" id="InsertBtn" class="InsertBtn">Inserir</button>
            </form>          
        </div>   
        
        <div>
            <form method="POST" action="tools.php">
                <button type="submit" value="Inicio" name="Inicio" class="pagination_btn">Inicio</button>
                <button type="submit" value="Anterior" name="Anterior" class="pagination_btn">Anterior</button>
                <button type="submit" value="Proximo" name="Proximo" class="pagination_btn">Proximo</button>
            </form>
        </div>

                <form method="post" action=Update_tools.php class="TableForm">        
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

                            }

                            $rows = array_reverse($rows);

                            usort($rows, function($a, $b) {
                                return $a['Devolveu'] - $b['Devolveu'];
                            });                                             
                        

                            if( count($rows)<$limit ){
                                $limit=count($rows);
                            }                      
                       
                        
                            for($i=$offset; $i<$limit; $i++){
                                echo"<tr>";  
                                echo"<td class='id-column'>" .$rows[$i]['id']. "</td>";
                                echo "<td>" .$rows[$i]['Nome']. "</td>";
                                echo "<td>" .$rows[$i]['Empresa']. "</td>";
                                echo "<td>" .$rows[$i]['Ferramenta']. "</td>";
                                echo "<td>" .$rows[$i]['Data']. "</td>"; 
                                if($rows[$i]['Devolveu']==0){
                                    echo "<td class='tdnot'>"."Não"."</td>"; 
                                    echo "<td><button class=action type='submit' name=id value=" .$rows[$i]['id']. ">Finalizar</button></td>";
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

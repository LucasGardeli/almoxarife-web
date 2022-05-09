<?php
require("connection.php");
session_start();
// verificar se o usúario foi logado 
$usuario = $_SESSION['usuario'];
$nome = $_SESSION['nome'];
$funcao = $_SESSION['função'];


if(!$usuario){
    header('location:index.html');
}


?>



<!DOCTYPE html>
    <head>
        <title>Painel</title> 
        <link rel="stylesheet" href="css/Feed_styles.css">   
        <meta name="viewport" content="width=device-width, initial-scale=1.0">   
        <script src="https://kit.fontawesome.com/75bcf85506.js" crossorigin="anonymous"></script>

        <?php require ("header.php"); ?>   
    </head>

    <body> 
        <header>
            
        </header>       
        <main>
            <div class="user_panel">                                         
                <div class="user_info">
                <div class="user_name">
                    <h4><?php echo $nome ?></h4>                                                          
                </div>       
                    <img class="user_avatar" src="resources/avatar.png">
                    <div class="name_underline"></div>
                    <h5><i class="fa-solid fa-user-graduate"></i> <?php echo $funcao;?></h5>
                    <h5><i class="fa-solid fa-cake-candles"></i> 01/02/1900</h5>
                    <h5><i class="fa-solid fa-city"></i> Taubaté-SP</h5>
                </div>
                <div class="user_event">                    
                    <div class="name_underline"></div>
                    <h5><i class="fa-regular fa-calendar-check"></i>  Meus Eventos</h5>
                    <h5><i class="fa-solid fa-user-group"></i></i>  Grupos</h5>
                    <h5><i class="fa-solid fa-city"></i> Calendario</h5>
                </div>
            </div>

            <div class="feed">
                <!-- <div class="teste"></div> -->
                <form class="diario_form" method="post" action="Insert_post.php">
                    <header>
                        <h4>  Diario de Obra</h4>
                        <h4>2022</h4>
                    </header>
                
                    <input class="input_obra" type="text" name="obra" list="obras" placeholder="Obra">
                    <datalist id="obras" class="imput_obra">
                    <option value="Nenhum">  
                    <option value="Edifício Europa">  
                    <option value="Edifício Lucca">
                    </datalist>

                <!-- <input type="text" class="diario_content" placeholder="Diario de Obra:...">  -->
                <textarea class="diario_content" placeholder="Diario de Obra:..." name="texto"></textarea>              
                    <button type="submit" class="post_button"><i class="fa-solid fa-pencil"></i>Postar</button>
                </form>
                <!-- <div class="post" id=""> 
                    <div class="post_title"> 
                    <img class="user_avatar" src="resources/avatar.png">
                     <p> SARDINHA </p>
                    </div>
                    
                    <div class="post_line"> </div>

                    <div class="post_textbox"> 
                        <p> Estamos testando novas funcionalidades do novo site. </p>
                        
                    </div>
                </div> -->
                <?php
                    $conn=New Connection();
                    $pdo=$conn ->Connect();
                    $stmt=$pdo ->prepare("SELECT * FROM diario_obra");
                    
                    try{
                        $stmt->execute();
                        // echo var_dump($stmt->fetchAll());
                    }catch(PDOException $e){
                        echo "Error: ".$e->getMessage();
                    }
                    // $result = array_reverse($stmt->);

                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $items[] = $row;
                    }
                    $items = array_reverse($items);

                    foreach($items as $row){
                        echo "<div class='post' id=''>";
                            echo "<div class='post_title'>"; 
                            echo "<img class='user_avatar' src='resources/avatar.png'>";
                            echo "<p>" .$row["autor"]. "</p>";
                            // echo "<p><br>qq</p>";
                                 
                        echo "</div>";
                        echo "<div class='post_info'>";
                        echo "<h4>" .$row['obra'] . " - ".$row['data']. "</h4>";
                        // echo "<h4> -" .$row['data'] . "</h4>";
                        echo "</div>";                     
                        echo "<div class='post_line'> </div>";    
                        echo "<div class='post_textbox'>"; 
                            echo "<p>" .$txt = nl2br($row["texto"]);  "</p>";                            
                        echo "</div>";
                        echo "<img src=".$row['fotos'].">";
                        echo "</div>";


                    }


                ?>
                
            </div>

            <div class="events">

            </div>
        </main>






    </body>





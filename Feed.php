<?php
session_start();
$usuario = $_SESSION['usuario'];
$nome = $_SESSION['nome'];
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
                <div class="user_name">
                    <h4><?php echo $nome ?></h4>
                    <img class="user_avatar" src="resources/avatar.png">
                    <div class="name_underline"></div>
                </div>
            </div>

            <div class="feed">
                <div class="teste"></div>
                <form class="diario_form" method="post" action="Insert_post.php">
                    <header>
                        <h4>  Diario de Obra</h4>
                        <h4>2022</h4>
                    </header>
                    <!-- <input type="text" class="diario_content" placeholder="Diario de Obra:...">  -->
                    <textarea class="diario_content" placeholder="Diario de Obra:..." name="diario_post"></textarea>                   
                    <button type="submit" class="post_button">Postar</button>
                </form>
                <div class="post" id=""> 
                    <div class="post_title"> 
                    <img class="user_avatar" src="resources/avatar.png">
                     <p> Lucas Gardeli </p>
                    </div>
                    
                    <div class="post_line"> </div>

                    <div class="post_textbox"> 
                        <p> Estamos testando novas funcionalidades do novo site. </p>
                        
                    </div>
                </div>
            </div>

            <div class="events">

            </div>
        </main>






    </body>





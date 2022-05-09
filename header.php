<DOCTYPE html>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header_styles.css">
    <!-- <script defer src="css/fontawesome/js/all.js"></script> -->
    <script src="https://kit.fontawesome.com/69999be494.js" crossorigin="anonymous"></script>
    <container>
        <div class="header_body">
            <div class="header_buttons">            
                <div class="home_button" onclick="window.location.href='feed.php'">
                    <div class=""><i class="fa fa-home" aria-hidden="true"> </i> </div>                    
                        <h3>Inicio</h3>                   
                </div>

                <button type="link" class="header_button" onclick="window.location.href='\index.html'">
                    <div class="icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                    <h3>Diario de Obra</h3>
                </button>

                <button type="link" class="header_button" onclick="window.location.href='\index.html'">
                    <div class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                    <h3>Requisições</h3>                 
                </button>      

                <button type="link" class="header_button" onclick="window.location.href='tools.php'">
                    <div class="icon"><i class="fa-solid fa-hammer"></i></div>
                    <h3>Almoxarife</h3>                 
                </button>                  
           
            </div>
            <button type="link" class="header_button" id="logout_btn" onclick="window.location.href='\logout.php'";>
                <h4> Sair </h4>
            </button>
        
        
    </div>

    </container>
    
  
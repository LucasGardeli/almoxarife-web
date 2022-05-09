<?php
$username = $_POST["user"];
$pwd = $_POST["password"];
require_once "connection.php";
session_start();


 function auth($user,$pwdd){    
     //echo "nafunção";
    $con = new Connection();
    $pdo = $con->Connect();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE(username=:username)");
    //$stmt = $pdo->prepare("INSERT INTO users(username,password) VALUES(:username,:password)");


    $stmt->bindParam(':username',$user,PDO::PARAM_STR);
    
    try{
       $stmt->execute();
       $result = $stmt ->fetch(PDO::FETCH_ASSOC);
       //COMPARA SENHA
       $pwdd = md5($pwdd);  
        if($result){
            if(!strcmp($pwdd, $result["password"])){                              
                echo json_encode(array('code' => "Bem-Vindo $user"));
                $_SESSION['usuario'] =$result['username'];
                $_SESSION['nome']=$result["nome"];
                $_SESSION['função']=$result["função"];
                header("Location:Feed.php");
            }else{
                              
                echo json_encode(array('code' => 'SENHA INCORRETA'));                              
                session_abort();
            }
        }else{
            session_abort();        
            echo json_encode(array('code' => 'USUARIO NÃO ENCONTRADO'));
        }
           
        
    }catch(Exception $e){
                    
            echo json_encode( array('LOGIN' => $e));
       
    }

 }  
 if(isset ($_POST["login"])){ 
    auth($username,$pwd);   
}

if($username||$pwd){
    auth($username,$pwd);   

}



<?php


class Connection{
    private $host = "localhost";
    private $db   = "terradb";
    private $user = "root";
    private $key  = "159123";
    private $dsn = "mysql:host=localhost;dbname=almoxarife;";



    public function Connect(){
        try{
            $pdo = new PDO($this->dsn,$this->user,$this->key);
           // echo '<h2>"Conectado"<h2/>';
            return $pdo;
        }catch (PDOException $ex){
            $error = $ex->getMessage();
            //echo "<h1>$error<h1/>";
        }
    }

    

}

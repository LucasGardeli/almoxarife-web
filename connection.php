<?php


class Connection{
    private $host = "localhost";
    private $db   = "terradb";
    private $user = "root";
    private $key  = "";
    private $dsn = "mysql:host=localhost;dbname=europa;";



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

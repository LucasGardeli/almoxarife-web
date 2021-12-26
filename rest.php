<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require_once ('connection.php');


try{
    $con = new Connection();
    $con->Connect();
}catch (ErrorException $ex){
   // echo $ex;
}

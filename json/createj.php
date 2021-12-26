<?php

require_once $_SERVER['DOCUMENT_ROOT']."/rest/connection.php";

$JSON = file_get_contents("php://input");

####### A API BLiP envia dados por POST somente com o body da requisição em formato JSON.
####### E como o método POST é o "mais seguro" e recomendado para executar uma ação (Criar, Atualizar, deletar etc)
####### é de grande importância implementar o método para receber um json pelo método POST


# 1° é necessario validar se o que recebemos no corpo da requisição é um JSON

function validateJSON($json){
    $request_file = json_decode($json);

    //retorna a mensagem somente se não houver erro, caso contrario não receberá retorno
    // a expressao return seguida de uma comparaçao funciona como um if
    return json_last_error()===JSON_ERROR_NONE;

}

if(file_get_contents("php://input"))
    {
        if(validateJSON($JSON)){
            echo "é um json\n";
            $params  = json_decode($JSON);
            echo $params->user;
    
        }else{
            echo "não é um json";
            //echo json_last_error_msg();
        }
    }   






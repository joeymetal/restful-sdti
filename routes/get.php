<?php
//GET pode possuir um parametro na url

$app->get('/api/v1/:controller/:action(/:parameter)', 'authenticate',
    function ($controller, $action, $parameter = null) use($app){
      //nova assinatura  
     $controller = $controller.'Controller';
     
     //ucfirst — Converte para maiúscula o primeiro caractere de uma string
     $controller = ucfirst($controller);
     
     include_once "controllers/{$controller}.php";
     $classe = new $controller();
     $retorno = call_user_func_array(array($classe, "get_".$action),
     array($parameter));
     
     /**
      * antigo exemplo 
      * echo '{"result": ' . json_encode($retorno) . '}';
      * o retorno json e na classe
      */
        echo $retorno;
    });

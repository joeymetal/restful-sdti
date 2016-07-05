<?php
//POST não possui parâmetros na url, e sim na requisição

$app->post('/api/v1/:controller/:action', 'authenticate', function($controller, $action) use($app)
{
   $request = json_decode(\Slim\Slim::getInstance()->request()->getBody());
   //nova assinatura  
   $controller = $controller.'Controller';
   
   //ucfirst — Converte para maiúscula o primeiro caractere de uma string
   $controller = ucfirst($controller);
     
   include_once "controllers/{$controller}.php";
   
   $classe = new $controller();
   $retorno = call_user_func_array(array($classe, "post_".$action),
   array($request));
   /**
      * antigo exemplo 
      * echo '{"result": ' . json_encode($retorno) . '}';
      * o retorno json e na classe
      */
        echo $retorno;
});
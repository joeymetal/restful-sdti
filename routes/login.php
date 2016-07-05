<?php
//POST não possui parâmetros na url, e sim na requisição
//api/v1/admin/login
$app->post('/admin/login', function() use($app)
{
   $request = json_decode(\Slim\Slim::getInstance()->request()->getBody());
   
   $controller = 'AuthenticateController';
   
   include_once "controllers/{$controller}.php";
   
   $classe = new $controller();
   
   $retorno = call_user_func_array(array($classe, "post_login"),
   array($request));
   /**
      * antigo exemplo 
      * echo '{"result": ' . json_encode($retorno) . '}';
      * o retorno json e na classe
      */
        echo $retorno;
});
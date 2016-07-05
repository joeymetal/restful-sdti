<?php

//session_start 
session_start();

//inicia o autoload do composer
require 'vendor/autoload.php';

//log init 
$log = new MyLogPHP('./log/debug.log.csv');
//log info
$log->info('The log starts here.');
// Timezone

date_default_timezone_set('America/Sao_paulo');

//db congig
// require 'db/DB.php';
// require 'db/config.php';

require 'config/configActiveRecord.php';
require 'config/authenticate.php';


//app start

$app = new \Slim\Slim(array(
    'debug' => false
    ));

// header 

$app->contentType("application/json");

//Tratamento de erros 

$app->error(function( Exception $e = null) use ($app){
    $response["success"] = "false";
    $response["code"] = "0";
    $response["message"] = $e->getMessage();
    echo json_encode($response);
    ##echo '{"error":[{"text":"'. $e->getMessage() . '"}]}';
    
});

$app->notFound(function () use ($app) {
     $response["success"] = "false";
     $response["code"] = "0";
     $response["message"] = "404 Page Not Found";
    echo json_encode($response);
     ##echo '{"error":[{"text":"404 Page Not Found"}]}';
});

//routes

require 'routes/init.php';
require 'routes/get.php';
require 'routes/post.php';
require 'routes/put.php';
require 'routes/delete.php';
require 'routes/login.php';

//logs info
$log->info('The program starts here.');

//rum app
$app->run();
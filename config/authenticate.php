<?php

// function mw1() {
//     echo "This is middleware!";
//     //  $app = \Slim\Slim::getInstance();
//     //  $app->stop();
// }

function authenticate() {
    $app = \Slim\Slim::getInstance();
    /**
     * '' não 
     * '!' sim
     * isset($_SESSION["login_id"])
     * 
     * || !isset($_COOKIE['api-key'])
    */
    if(!isset($_SESSION["login_id"])){
            #echo '{"error":[{"text": "Access Denied. Invalid Api key or user_id"}]}';
             throw new Exception("Access Denied. Invalid Api key or user_id");
            $app->stop();
         }
         
        //  else{
        //     //redicionamento ao login
        // }
}
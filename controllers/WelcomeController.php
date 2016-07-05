<?php 
class WelcomeController{
    function get_HelloWorld($nome=null){
        return "Hello, $nome welcome!";
    }
}
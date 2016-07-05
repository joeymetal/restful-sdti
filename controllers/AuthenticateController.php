<?php 
//helpers de senha
require_once 'helpers/helperPassword.php';
class AuthenticateController{
    
    function post_login($data){
        
        if ($_SESSION["login_id"] != null){
            $response["success"] = "true";
            $response["code"] = "1";
            $response["message"] = "você esta logado";
            return json_encode($response);
            # $app->stop();
        #throw new Exception("você esta logado");
        }else{
        if ((empty($data->username)) or (empty($data->password))){
        throw new Exception("Login ou senha precisam ser preenchidos");
        }
        #require_once 'helpers/helperPassword.php';
        #$password = verify($data->password);
        
        
        #verifica usario no banco
        $db_user =  User::find('all', array('conditions' => array('username = ? AND password = ? ', $data->username, hashpassword($data->password)))); #->to_json() $data->id
       
        #fim
        
       # if($password != 0){
            
            if ($db_user!= null) {
                //array push result
                $result = array();
                foreach($db_user as $data) {
                    array_push($result, $data->to_array()); //using to_array instead of to_json
                    }
                    
                     $token = generateToken($db_user);
                       
                        //$db_user->token =$token;
                    #fazer o login so add apikey e session
                        $this->doLogin($db_user);
                        unset($user->password);
                        unset($user->password_salt);
                        
                    #echo json_encode($result);
                    
                     $response["success"] = "true";
                     $response["code"] = "1";
                     $response["message"] = "Sucesso - Bem vindo";
                     $response["result"] = $result;
                        //return $token;
                    // return '{"result": ' . json_encode($result) .'}';
                     return json_encode($response);
                     //return '{"error":[{"text":"logado"}]}';
                    
             
                #print_r($db_user);
                #return db_user;
            }
            else
                throw new Exception("Erro ao efetuar login. Usuário/Senha incorretos");
            
            #$status = "correto";
       # }else{
            #$status = "error";
        #}
        #return $status;
        return false;
        }
    }
    
    function get_apikey(){
        $response["success"] = "true";
        $response["code"] = "1";
        $response["message"] = "Sucesso ao gerar apikey";
        $response["result"] = $this->getApikey();
        return json_encode($response);
    }
    
    function getApikey(){
        //return 'api key: owowdknv8uue';
        $userid = $_SESSION["login_id"];
       
        $user =  User::find($userid);
                   $apikey=  $user->apikey;
          
        return $apikey;
    }
    
    function get_token(){
        $response["success"] = "true";
        $response["code"] = "1";
        $response["message"] = "Sucesso ao gerar token";
        $response["result"] = $this->getToken();
        return json_encode($response);
    }
    
     function getToken(){
       $userid = $_SESSION["login_id"];
       
       $user =  User::find($userid);
                   $token =  $user->token;
          
        return $token;
    }
    
    
    
    function get_logout(){
        $_SESSION["login_id"] = null;
        $_SESSION["login_name"] = null;
        $_SESSION["api_key"] = null;
        $_SESSION["token"] = null;
        $_COOKIE['api-key'] = null;
          $app = \Slim\Slim::getInstance();
            $response["success"] = "true";
            $response["code"] = "1";
            $response["message"] = "Desconectado";
            return json_encode($response);
                 // return '{"result": [{ "menssage": "logout"}]}';
          $app->stop();
    }
    
    public function post_perfil() {
        
        
    }
    
    
    function get_user(){
        $response["success"] = "true";
        $response["code"] = "1";
        $response["message"] = "Usuario gerado";
        $response["userid"]  = $_SESSION["login_id"];
        $response["username"]  = $_SESSION["login_name"];
        $response["api-key"]  = $this->getApikey();
        $response["token"]  = $this->getToken();
        $response["api_key"]  = $this->getApikey();
        return json_encode($response);
       
        //return '{"result": [{ "id": '.$userid . ' , "nome":  "'. $username .'" , "apikey": '. $apikey .'" , "api_key": '. $api_key .'" , "token": '. $token .'}]}';
        
        # return json_encode('{"result": [{ "id": '.$userid . ' , "nome": '. $username .' , "api_key": '. $apikey .'}]}');
        #return json_encode("id: ". $userid . "-nome: ". $username ." - api_key: ". $apikey);
    }
    
    function post_register($data){
        if ((empty($data->username)) and (empty($data->password)))
            throw new Exception("Login ou senha precisam ser preenchidos");
        
        #require_once 'helpers/helperPassword.php';
        $response["password"] = hashpassword($data->password);
        $response["username"] = $data->username;
        $response["message"] = "Usuario registrado";
        return json_encode($response);
        //return "register: ". $username . " | password: ". $password;
    }
    
      protected function doLogin($user) {
        
        /* Adiciona a data/ip do login */
        #$sql = "UPDATE usuarios SET lastLogin=now(),lastIp=:lastIp WHERE id=:id";
        #$stmt = DB::prepare($sql);
        #$stmt->bindParam("lastIp",$_SERVER['REMOTE_ADDR']);
        #$stmt->bindParam("id", $usuario->id);
        #$stmt->execute();
        foreach($user as $data) {
            $_SESSION["login_id"]= $data->id;
            $_SESSION["login_name"]= $data->username;
            
            $_SESSION["token"] = $this->getToken();
            #'Nti4kWY-qRHTYq3dsbeip0P1tbGCzs2BAY163ManCAb'
            
            $_SESSION["api_key"] = $this->getApikey();
            setcookie('api-key', $this->getApikey(), time() + (86400 * 30), "/"); // 86400 = 1 day + 3600,);
        }
        
        #$_SESSION["login_id"] = 1;# $user->id;
        #$_SESSION["login_name"] = "joey";#$user->nome;
        
       #echo  $_SESSION["login_id"] . "||||" . $_SESSION["login_name"];
    }
}
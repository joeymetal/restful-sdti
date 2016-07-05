 <?php
 
   function hashpassword($password){
       #BCryptRequires22Chrcts
        $options = [
            'cost' => 7,
            'salt' => 'sdtiSDTIsdtiSDTIsdtiSDTI',
        ];
       $password = password_hash($password, PASSWORD_BCRYPT, $options);
       return $password;
    }


    
    function generateToken($user){
        $options = [
            'cost' => 7,
            'salt' => 'sdtiSDTIsdtiSDTIsdtiSDTI',
        ];
        
        $date = new DateTime();

       $token = password_hash($date->getTimestamp(), PASSWORD_BCRYPT, $options);
       
       foreach($user as $data) {
       $user =  User::find($data->id);
                        $user->token = $token;
                        $user->save();
       }
       return $user;
    }
    
    function verify($password){
 
        // Valor salvo no banco de dados
       # User::find_by_password
        $hash = '$2y$07$sdtiSDTIsdtiSDTIsdtiS.pzapZkxTGGCC9ACpuirC/yewj1yQy9G';
        // Senha digitada pelo usuário
        #$senha = 'rasmuslerdorf';
        $senha = $password;
        
        $password = password_verify($senha, $hash);
        if ($password == $hash) {
          #echo 'Senha correta';
          return $password;  
        } else {
            #'Senha incorreta 0 '
            return 0;
        }

    }
    
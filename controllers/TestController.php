<?php
class TestController{
    
    #lista pelo Id
    function get_list($id=null){
       $result =  Test::find($id)->to_json();
        return '{"result": [' . $result . ']}';
    }
    
     #lista pelo nome
    function get_listbyname($name=null){
       if($name!=null){
            $result = array();
            $sql =  Test::all( array('conditions' => "nome LIKE '%$name%'"));
            if($sql!=null){
            foreach($sql as $data) {
                array_push($result, $data->to_array()); //using to_array instead of to_json
            }
            $result = json_encode($result);
            }
       }else{
           $result = $this->get_listall();
       }
        return '{"result": ' . $result . '}';
    }
    
    #Lista todos os dados
    function get_listall(){
        
            $result = array();
            
            #$sql = Test::find('all');
            $sql = Test::all();
            foreach($sql as $data) {
                array_push($result, $data->to_array()); //using to_array instead of to_json
            }
            #echo json_encode($result);
             return '{"result": ' . json_encode($result) . '}';
    }
    
    
    //put Atualizar 
    function put_put($data){
            //update 
            $sql = Test::find($data->id);
            //date("d-m-Y H:i:s") date("Y-m-d  H:i:s") tanto faz
            $sql->update_attributes(array('nome' => $data->nome, 'user_id' => $data->user_id, 'updated' => date("Y-m-d  H:i:s") ));
            $sql->save();
            $retorno = $sql->to_json();
            return '{"result": [' . $retorno . ']}';;
    }
    
    //Salva e edita a tabela
    function post_save($data){
        $sql->null;
        if($data->id){
            //update 
            $sql = Test::find($data->id);
            //date("d-m-Y H:i:s") date("Y-m-d  H:i:s") tanto faz
            $sql->update_attributes(array('nome' => $data->nome, 'user_id' => $data->user_id, 'updated' => date("Y-m-d  H:i:s") ));
        }else{
             //insert
            $attributes = array('nome' => $data->nome, 'user_id' => $data->user_id, 'created' => date("Y-m-d  H:i:s") );
            $sql = new Test($attributes);
        }
        
        $sql->save();
        $retorno = $sql->to_json();
        // if($data->id!=0){
        //         $data = Test::find('last');
        //       return '{"result": ' . json_encode($data) . '}';;
        // }
        return '{"result": [' . $retorno . ']}';;
    }
    
    #deleta uma linha pelo id
    function post_delete($data){
        $sql = Test::find($data->id);
        $retorno = $sql->to_json();
        $sql->delete();
        // if(){
            return '{"result": [' . $retorno . ']}';;
        // }else{
        //     return '{"error": "não foi posivel deletar"}';;
        // }
    }
    
     function delete_delete($data){
        $sql = Test::find($data->id);
        $retorno = $sql->to_json();
        $sql->delete();
        // if(){
            return '{"result": [' . $retorno . ']}';;
        // }else{
        //     return '{"error": "não foi posivel deletar"}';;
        // }
    }
    
    //fim
    
    // function get_HelloWorld($nome=null){
    //     // return "Hello word, $nome";
        
    //     if(isset($_SESSION["login_id"])){
    //         return "Hello word, $nome";
    //     }else{

    //         #echo $arToJson($users, array('exept' => 'password'));

    //         $result = array();
            
    //         $sql = Test::find('all');
            
    //         foreach($sql as $data) {
    //         array_push($result, $data->to_array()); //using to_array instead of to_json
    //         }
            
            
            
    //         #echo json_encode($result);
    //          return '{"result": ' . json_encode($result) . '}';
            
            
    //         #$data = Test::find_by_nome('Tito')->to_json();
            
    //         #$data = Test::find('all');
            
    //         #echo $data;
    //         #'all'
    //         // $json = $data->to_json(array(
    //         //   'only' => array('id', 'nome')
    //         // ));
    //         #echo $json;
    //         // $data = json_decode($data, true);
    //         // return json_encode( (array)$data);
            
            
    //         // function toArray($obj)
    //         // {
    //         //     if (is_object($obj)) $obj = (array)$obj;
    //         //     if (is_array($obj)) {
    //         //         $new = array();
    //         //         foreach ($obj as $key => $val) {
    //         //             $new[$key] = toArray($val);
    //         //         }
    //         //     } else {
    //         //         $new = $obj;
    //         //     }
            
    //         //     return $new;
    //         // }
            
            
    //         // function arToJson($data, $options = null) {
    //         //     $out = "[";
    //         //     foreach( $data as $row) { 
    //         //     if ($options != null)
    //         //     $out .= $row->to_json($options);
    //         //     else 
    //         //     $out .= $row->to_json();
    //         //     $out .= ",";
    //         //     }
    //         //     $out = rtrim($out, ',');
    //         //     $out .= "]";
    //         //     return $out;
    //         //     }

    //         //     echo $arToJson($d);

    //         // $array = (array) $data;
    //             #return  toArray($data);
           
    //     //   foreach($data as $d){
    //     //       echo $d;
    //     //   }
    //         #return "realise o login";
    //     }
    // }
}


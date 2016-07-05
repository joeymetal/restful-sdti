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
        return '{"result": [' . $retorno . ']}';;
    }
    
    #deleta uma linha pelo id usin post 
    function post_delete($data){
        $sql = Test::find($data->id);
        $retorno = $sql->to_json();
        $sql->delete();
    
        return '{"result": [' . $retorno . ']}';;
        
    }
    
    #deleta uma linha pelo id usin delete
     function delete_delete($data){
        $sql = Test::find($data->id);
        $retorno = $sql->to_json();
        $sql->delete();
        
        return '{"result": [' . $retorno . ']}';;
       
    }
    
    //fim
    
}


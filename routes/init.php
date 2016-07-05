<?php
//Pagina inicial

$app->get('/api/v1/', function () {
    #Test::create(array('nome' => 'Tito', 'user_id' => '1'));
    #$data['test'] = Test::find('all');
    #$data = Test::find('all');
    
    #array_walk($data,myfunction); 
    #echo json_encode ($data) ;
     #json_encode(array_values($data->nome))
    #$obj = json_encode($data->nome);
    #echo $obj;
    
    #$result = $data->;
    
    //   foreach($data as $d){
    //           echo $d;
    //       }©
    echo '{"menssage":[{"text": "Welcome to Restful api to BMS -  2016 - sdti"}]}';
});
<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
    
    include_once('../core/initialize.php');                       //initialize the api

    $programme = new Programme($db);                              //instantiate programme

    $data = json_decode(file_get_contents("php://input"));        //get raw posted data

    $programme->id_progr = $data->id_progr;

    if($programme->delete()){                                     //create post
        echo json_encode(
            array('message' => 'Programme deleted!')
        );
    }
    else{
        echo json_encode(
            array('message' => 'Programme not deleted!')
        );
    }

?>
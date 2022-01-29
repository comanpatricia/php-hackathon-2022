<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
    
    include_once('../core/initialize.php');                       //initialize the api

    $programme = new Programme($db);                              //instantiate programme

    $data = json_decode(file_get_contents("php://input"));        //get raw posted data

    $programme->progr_type_id = $data->progr_type_id;
    $programme->maximum = $data->maximum;
    $programme->rooms_id = $data->rooms_id;
    $programme->start_time = $data->start_time;
    $programme->end_time = $data->end_time;

    if($programme->create()){                                           //create post
        echo json_encode(
            array('message' => 'Programme created!')
        );
    }
    else{
        echo json_encode(
            array('message' => 'Programme not created!')
        );
    }

?>
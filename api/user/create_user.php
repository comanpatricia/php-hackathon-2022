<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
    
    include_once('../../core/initialize.php');                         //initialize the api

    $user = new User($db);                                        //instantiate user

    $data = json_decode(file_get_contents("php://input"));          //get raw posted data

    $user->cnp = $data->cnp;

    if($user->create()){                                           //create post
        echo json_encode(
            array('message' => 'user created!')
        );
    }
    else{
        echo json_encode(
            array('message' => 'user not created!')
        );
    }

?>
<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
    
    include_once('../../core/initialize.php');                      //initialize the api

    $admin = new Admin($db);                                        //instantiate admin

    $data = json_decode(file_get_contents("php://input"));          //get raw posted data

    $admin->admin_username = $data->admin_username;

    if($admin->create()){                                           //create post
        echo json_encode(
            array('message' => 'Admin created!')
        );
    }
    else{
        echo json_encode(
            array('message' => 'Admin not created!')
        );
    }

?>
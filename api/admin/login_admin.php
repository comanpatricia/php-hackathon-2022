<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once('../../core/initialize.php');                  //initialize the api

    $admin = new Admin($db);                                    //instantiate programme

    $result = $admin->login();                                  //programme query


    if(isset($_POST['submit'])){
        $admin_username = md5($_POST['admin_username']);
        $token = $_POST['token'];
        echo json_encode(array('message' => 'Successfully logged in!'));
    }
    else
    {
        echo json_encode(array('message' => 'Try again!'));
    }


?>
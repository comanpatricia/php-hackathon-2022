<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once('../../core/initialize.php');                      //initialize the api

    $admin = new Admin($db);                                        //instantiate admin

    $result = $admin->read();                                       //admin query

    $num = $result->rowCount();                                     //get the row count

    if($num>0){
        $admin_arr = array();
        $admin_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $admin_item = array(
                'admin_username'    => $admin_username,
                'token'             => $token
            );
        array_push($admin_arr['data'], $admin_item);

        }
        echo json_encode($admin_arr);                                //convert to json and output
    }
    else
    {
        echo json_encode(array('message' => 'No admins found.'));
    }

?>
<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once('../../core/initialize.php');                         //initialize the api

    $user = new User($db);                                        //instantiate user

    $result = $user->read();                                       //user query

    $num = $result->rowCount();                                     //get the row count

    if($num>0){
        $user_arr = array();
        $user_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $user_item = array(
                'cnp'    => $cnp,
            );
        array_push($user_arr['data'], $user_item);

        }
        echo json_encode($user_arr);                                //convert to json and output
    }
    else
    {
        echo json_encode(array('message' => 'No users found.'));
    }

?>
<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once('../../core/initialize.php');                         //initialize the api

    $type = new Type($db);                                          //instantiate type

    $result = $type->read();                                        //type query

    $num = $result->rowCount();                                     //get the row count

    if($num>0){
        $type_arr = array();
        $type_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $type_item = array(
                'id_type'    => $id_type,
                'type'       => $type
            );
        array_push($type_arr['data'], $type_item);

        }
        echo json_encode($type_arr);                                //convert to json and output
    }
    else
    {
        echo json_encode(array('message' => 'No types found.'));
    }

?>
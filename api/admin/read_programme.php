<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once('../../core/initialize.php');                      //initialize the api

    $programme = new Programme($db);                                //instantiate programme

    $result = $programme->read();                                   //programme query

    $num = $result->rowCount();                                     //get the row count

    if($num>0){
        $programme_arr = array();
        $programme_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $programme_item = array(
                'id_progr'      => $id_progr,
                'progr_type'    => $progr_type,
                'maximum'       => $maximum,
                'room'          => $room,
                'start_time'    => $start_time,
                'end_time'      => $end_time
            );
        array_push($programme_arr['data'], $programme_item);

        }
        echo json_encode($programme_arr);                           //convert to json and output
    }
    else
    {
        echo json_encode(array('message' => 'No programmes found.'));
    }
?>
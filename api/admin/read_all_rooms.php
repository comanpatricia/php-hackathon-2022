<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once('../../core/initialize.php');                         //initialize the api

    $room = new Room($db);                                          //instantiate room

    $result = $room->read();                                        //room query

    $num = $result->rowCount();                                     //get the row count

    if($num>0){
        $room_arr = array();
        $room_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $room_item = array(
                'id_room'           => $id_room,
                'room_number'       => $room_number,
                'programme'        => $programme

            );
        array_push($room_arr['data'], $room_item);

        }
        echo json_encode($room_arr);                                //convert to json and output
    }
    else
    {
        echo json_encode(array('message' => 'No rooms found.'));
    }





?>
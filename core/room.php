<?php
class Room{
    private $conn;                              //db
    private $table = 'rooms';

    public $id_room;
    public $room_number;                        //programme properties
    public $progr_type;

    public function __construct($db){           //contructor with db conn
        $this->conn = $db;
    }

    public function read(){                     //getting programmes from db
        $query = 'SELECT
        pt.type as programme,
        r.id_room,
        r.room_number, 
        r.progr_type
        FROM 
        ' .$this -> table. ' r
        LEFT JOIN 
            progr_types pt ON r.progr_type = pt.id_type'; 


    $stmt = $this->conn->prepare($query);       //prepare statment
    $stmt->execute();                           //execte query

    return $stmt;
    }

}
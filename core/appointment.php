<?php

class Appointment{
    private $conn;                              //db
    private $table = 'appointments';

    public $id;                              //admin properties
    public $cnp;
    public $room_number;
    public $time;

    public function __construct($db){           //contructor with db conn
        $this->conn = $db;
    }

    public function read(){                     //getting appointments from db
        $query = 'SELECT * FROM ' .$this -> table; 

    $stmt = $this->conn->prepare($query);       //prepare statment
    $stmt->execute();                           //execte query

    return $stmt;
    }

    public function register(){                   //create query
        $query = 'INSERT INTO ' . $this->table . ' 
        SET id = :id, cnp = :cnp, room_number = :room_number, time = :time';
    
        $stmt = $this->conn->prepare($query);   //prepare statment
        
                                                //clean data
        $this->id           = htmlspecialchars(strip_tags($this->id));
        $this->cnp          = htmlspecialchars(strip_tags($this->cnp));
        $this->room_number  = htmlspecialchars(strip_tags($this->room_number));
        $this->time         = htmlspecialchars(strip_tags($this->time));

                                                //hiding parameters
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':cnp', $this->cnp);
        $stmt->bindParam(':room_number', $this->room_number);
        $stmt->bindParam(':time', $this->time);

        if($stmt->execute()){                   //query execution
            return true;
        }

        printf("Error %s. \n", $stmt->error);
        return false;
    }

}
?>
<?php
class Programme{
    private $conn;                          //db
    private $table = 'programmes';

    public $progr_type_id;
    public $maximum;                        //programme properties
    public $rooms_id;
    public $start_time;
    public $end_time;

    public function __construct($db){           //contructor with db conn
        $this->conn = $db;
    }

    public function read(){                     //getting programmes from db
        $query = 'SELECT
        pt.type as progr_type,
        r.room_number as room,
        p.id_progr,
        p.progr_type_id,
        p.maximum,
        p.start_time,
        p.end_time,
        p.rooms_id
        FROM 
        ' .$this -> table. ' p
        LEFT JOIN 
            progr_types pt ON p.progr_type_id = pt.id_type
        LEFT JOIN 
            rooms r ON p.rooms_id = r.id_room'; 


    $stmt = $this->conn->prepare($query);       //prepare statment
    $stmt->execute();                           //execte query

    return $stmt;
    }

    public function create(){                   //create query
        $query = 'INSERT INTO ' . $this->table . ' 
        SET progr_type_id = :progr_type_id, maximum =:maximum, rooms_id = :rooms_id, start_time = :start_time, end_time = :end_time';
    
        $stmt = $this->conn->prepare($query);   //prepare statment
        
                                                //clean data
        $this->progr_type_id    = htmlspecialchars(strip_tags($this->progr_type_id));
        $this->maximum          = htmlspecialchars(strip_tags($this->maximum));
        $this->rooms_id         = htmlspecialchars(strip_tags($this->rooms_id));
        $this->start_time       = htmlspecialchars(strip_tags($this->start_time));
        $this->end_time         = htmlspecialchars(strip_tags($this->end_time));

                                                //hiding parameters
        $stmt->bindParam(':progr_type_id', $this->progr_type_id);
        $stmt->bindParam(':maximum', $this->maximum);
        $stmt->bindParam(':rooms_id', $this->rooms_id);
        $stmt->bindParam(':start_time', $this->start_time);
        $stmt->bindParam(':end_time', $this->end_time);

        if($stmt->execute()){                   //query execution
            return true;
        }

        printf("Error %s. \n", $stmt->error);
        return false;
    }

    public function update(){                   //update query
        $query = 'UPDATE ' . $this->table . ' 
        SET progr_type_id = :progr_type_id, maximum =:maximum, rooms_id = :rooms_id, start_time = :start_time, end_time = :end_time
        WHERE id_progr = :id_progr';
    
        $stmt = $this->conn->prepare($query);   //prepare statment
        
                                                //clean data
        $this->progr_type_id    = htmlspecialchars(strip_tags($this->progr_type_id));
        $this->maximum          = htmlspecialchars(strip_tags($this->maximum));
        $this->rooms_id         = htmlspecialchars(strip_tags($this->rooms_id));
        $this->start_time       = htmlspecialchars(strip_tags($this->start_time));
        $this->end_time         = htmlspecialchars(strip_tags($this->end_time));
        $this->id_progr         = htmlspecialchars(strip_tags($this->id_progr));

                                                //hiding parameters
        $stmt->bindParam(':progr_type_id', $this->progr_type_id);
        $stmt->bindParam(':maximum', $this->maximum);
        $stmt->bindParam(':rooms_id', $this->rooms_id);
        $stmt->bindParam(':start_time', $this->start_time);
        $stmt->bindParam(':end_time', $this->end_time);
        $stmt->bindParam(':id_progr', $this->id_progr);

        if($stmt->execute()){                   //query execution
            return true;
        }

        printf("Error %s. \n", $stmt->error);
        return false;
    }

    public function delete(){
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_progr = :id_progr';
        
        $stmt = $this->conn->prepare($query);

        $this->id_progr         = htmlspecialchars(strip_tags($this->id_progr));

        $stmt->bindParam(':id_progr', $this->id_progr);

        if($stmt->execute()){                   //query execution
            return true;
        }

        printf("Error %s. \n", $stmt->error);
        return false;


    }
}
?>
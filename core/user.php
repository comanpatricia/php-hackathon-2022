<?php
class User{
    private $conn;                              //db
    private $table = 'users';

    public $cnp;                                //admin properties

    public function __construct($db){           //contructor with db conn
        $this->conn = $db;
    }

    public function read(){                     //getting admins from db
        $query = 'SELECT * FROM ' .$this -> table; 

    $stmt = $this->conn->prepare($query);       //prepare statment
    $stmt->execute();                           //execte query

    return $stmt;
    }

    public function create(){                   //create query
        $query = 'INSERT INTO ' . $this->table . ' 
        SET cnp = :cnp';
    
        $stmt = $this->conn->prepare($query);   //prepare statment
        
                                                //clean data
        $this->cnp  = substr(str_shuffle("01234567890123456789"), 13);

                                                //hiding parameters
        $stmt->bindParam(':cnp', $this->cnp);

        if($stmt->execute()){                   //query execution
            return true;
        }

        printf("Error %s. \n", $stmt->error);
        return false;
    }

}
?>
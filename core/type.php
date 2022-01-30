<?php
class Type{
    private $conn;                              //db
    private $table = 'progr_types';

    public $id_type;
    public $type;                               //programme properties

    public function __construct($db){           //contructor with db conn
        $this->conn = $db;
    }

    public function read(){                     //getting programmes from db
        $query = 'SELECT * FROM ' .$this -> table; 


    $stmt = $this->conn->prepare($query);       //prepare statment
    $stmt->execute();                           //execte query

    return $stmt;

    }

}
?>
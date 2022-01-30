<?php
class Admin{
    private $conn;                              //db
    private $table = 'admins';

    public $admin_username;                              //admin properties
    public $token;

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
        SET admin_username = :admin_username, token = :token';
    
        $stmt = $this->conn->prepare($query);   //prepare statment
        
                                                //clean data
        $this->admin_username   = md5(htmlspecialchars(strip_tags($this->admin_username)));
        $this->token            = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 30);

                                                //hiding parameters
        $stmt->bindParam(':admin_username', $this->admin_username);
        $stmt->bindParam(':token', $this->token);

        if($stmt->execute()){                   //query execution
            return true;
        }

        printf("Error %s. \n", $stmt->error);
        return false;
    }


    public function login(){
        $query = 'SELECT admin_username, token FROM ' . $this->table;

        $stmt = $this->conn->prepare($query);   //prepare statment

                                                //clean data
        $this->admin_username       = (htmlspecialchars(strip_tags($this->admin_username)));
        $this->token                = (htmlspecialchars(strip_tags($this->token)));
        
                                                //hiding parameters
        $stmt->bindParam(':admin_username', $this->admin_username);
        $stmt->bindParam(':token', $this->token);

        $stmt = $this->conn->prepare($query);    //prepare statment
        $stmt->execute();                        //execte query

        return $stmt;
        }

}
?>
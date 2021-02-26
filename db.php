<?php

class Database{
// Database Connection FORM PDO 
    private $dsn="mysql:host=localhost;dbname=mvc-pod-ajax-oop";
    private $pass="";
    private $user="root";
    public $conn;

    function __construct()
    {
        try{
            $this->conn=new PDO($this->dsn,$this->user,$this->pass);
        }catch(PDOException $e){
            echo "Database NOT connection"+$e->getMessage();
        }
    }

// Database Connection FORM PDO 

// Insert Data 
        public  function insert($fname,$lname,$emile,$phone){

        $sql="INSERT INTO user_tbl(fname,lname,emile,phone)VALUES(:fnam,:lnam,:eml,:phone)";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['fnam'=>$fname,'lnam'=>$lname,'eml'=>$emile,'phone'=>$phone]);

        return true;
        }
// Insert Data 

// Read form Database 
       public function read(){
            $data =array();
            $sql="SELECT * FROM user_tbl ORDER BY id DESC";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rasult=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rasult as $row){
                $data[] = $row;
            }
            return $data;
        }

// Read form Database 

// GetUser By Id 

       public function getuserById($id){

            $sql="SELECT * FROM user_tbl WHERE id=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $rasult=$stmt->fetch(PDO::FETCH_ASSOC);
            return $rasult;

        }

// GetUser By Id 

// Update user 

    public  function update($id,$fname,$lname,$emile,$phone){

    $sql="UPDATE user_tbl SET fname=:fnam, lname=:lnam, emile=:eml phone=:phone WHERE id=:id";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute(['id'=>$id,'fnam'=>$fname,'lnam'=>$lname,'eml'=>$emile,'phone'=>$phone]);

        return true;
    }

// Update user 

// Delete User From Database 
 public function delete($id)
{
    $sql="DELETE FROM user_tbl WHERE id=:id";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return true;
    
}
// Delete User From Database 

// Total Row Counter 

        public function totalRowCount()
        {
            $sql="SELECT * FROM user_tbl";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $t_rows = $stmt->rowCount();
            return $t_rows;
        
        }

        // Total Row Counter 

}






?>
<?php
// namespace rahul\PHP_Project;
// use \PDO;

class Connection{
    
 public $servername = "localhost";
 public $username = "root";
 public $password = "root";
public $dbname = "Rahul";
public $conn;
 
public function __construct() {
    $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // print_r($this->conn);
    // exit();
}

// public function getDb() {
//     return $this->conn;
// }

// public function insertion($id,$user,$email,$pass)
// {
//     $sql = "insert into users (id,user, email, pass) values ('$id','$user','$email','$pass')";
//     $c=$this->conn->prepare($sql);
//     $c->execute(array(':id'=>$id,':user'=>$user,':email'=>$email,':pass'=>$pass));
// }
// public function success($user,$pass)
// {
//     $sql = $this->conn->prepare("SELECT * FROM users WHERE user='$user' and pass='$pass'");
//     $rec=$sql->execute();
//     return $rec;
    
//     }
// }
}
// $con=new Connection();
?>
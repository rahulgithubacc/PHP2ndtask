<html>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'Connection.php';

class fun{
  public $id;public $user;public $pass; public $rolee;
    public function insertbyadmin($id,$user,$pass,$email,$rolee)
    { 
      $c=new Connection();
      $p = md5($pass);
      $sql = $c->conn->prepare("INSERT into users (id, user,pass, email,rolee) values ('$id','$user','$p','$email','$rolee')");
      $aa=$sql->execute();
      return $aa;
    }
    public function insertbyuser($id,$user,$pass,$email)
    {
     $c=new Connection();  
     $p = md5($pass);
     $sql = $c->conn->prepare("insert into users (id,user, pass,email) values ('$id','$user','$p','$email')");
     $aa=$sql->execute();
     return $aa; 
    }
    public function adminchecking($id,$pass)
    {
     $c=new Connection();
     $p = md5($pass);
     $sql = $c->conn->prepare("SELECT * FROM users WHERE id='$id' and pass='$p' and activeuser =1 and rolee='admin'");
     $sql->execute();
     $count=$sql->rowCount();
     return $count;
    }
    
    public function userchecking($id,$pass)
    {
     $c=new Connection();
     $p = md5($pass);
     $sql = $c->conn->prepare("SELECT * FROM users WHERE id='$id' and pass='$p'");
     $sql->execute();
     $count=$sql->rowCount();
     return $count;
    }   
    public function displayuser($var)
    {
      $c=new Connection();
      if($var=="all"){
        $sql = $c->conn->prepare("SELECT * FROM users");
      }
      else{
        $sql = $c->conn->prepare("SELECT * FROM users where rolee='$var'");
      } 
      $result=$sql->execute();
      $stmt=$sql->fetchAll();
      if($result>0)
      return $stmt;
      else
      return 0;
    }
    public function getcolcnt()
    {
      $c=new Connection();
      $sql=$c->conn->prepare("SELECT * FROM users WHERE id=1");
      $stmt = $sql->execute();
      $result = $sql->columnCount();    
      return $result;
    }
     public function deleteuser ($id)
    {
      $c=new Connection();
      $sql = $c->conn->prepare("delete from users where id='$id'"); 
      $res=$sql->execute();
      if($res)
       return 1;
       else
       return 0;
      
    }
    public function upadte($id)
    {
      $c=new Connection();
      $sql = $c->conn->prepare("SELECT * FROM users where id='$id'");
      $stmt = $sql->execute();
      return $stmt;

    }
}
?>
</body>
</html>

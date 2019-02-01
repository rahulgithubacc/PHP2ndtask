<html>
<body>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'Connection.php';

class fun{
  public $id;public $user;public $pass; public $rolee;
    public function insertbyadmin($id,$user,$pass,$email,$rolee,$hashh)
    { 
      $c=new Connection();
      $p = md5($pass);
      $sql = $c->conn->prepare("INSERT into users (id, user,pass, email,rolee,activeuser,hashh) values ('$id','$user','$p','$email','$rolee',1,'$hashh')");
      $aa=$sql->execute();
      return $aa;
    }
    public function insertbyuser($id,$user,$pass,$email,$hashh)
    {
     $c=new Connection();  
     $p = md5($pass);
     $sql = $c->conn->prepare("insert into users (id,user, pass,email,hashh) values ('$id','$user','$p','$email','$hashh')");
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
    public function update($id,$user,$email,$activate,$rolee){
      $c = new Connection();
      $sql="UPDATE users SET user='$user',email='$email',activeuser='$activate',rolee='$rolee' WHERE id='$id'";
      $stmt=$c->conn->prepare($sql);
      $result = $stmt->execute();
      return $result;
     
  }
    public function Emailfunction($email,$hashh){
    
      $c=new Connection();
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      
      
      // Import PHPMailer classes into the global namespace
      // These must be at the top of your script, not inside a function
      
      
      //Load Composer's autoloader
      require 'vendor/autoload.php';
      
       $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
      try {
          //Server settings
          // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'alshayakapoor@gmail.com';                 // SMTP username
          $mail->Password = 'Vrushali@123';                           // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;                                    // TCP port to connect to
      
          //Recipients
          $mail->setFrom('rahul.deshmukh@qed42.com', 'Mailer');
          $mail->addAddress($_POST['email'], 'Joe User');     // Add a recipient
          $mail->addAddress('ellen@example.com');               // Name is optional
          $mail->addReplyTo('info@example.com', 'Information');
          // $mail->addCC('cc@example.com');
          // $mail->addBCC('bcc@example.com');
      
          //Attachments
          // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      
          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Verification Mail For PHP Login';
          $mail->Body    = "Dear User, Please follow this link : http://localhost:8888/PHP_Project/verification.php?email=".$_POST['email']."&hashh=".$hashh;
          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      
          $mail->send();
          echo 'Message has been sent';
      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
          }
}
?>
</body>
</html>

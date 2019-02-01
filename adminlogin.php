<html>
<body>
<form>
<form method="POST" action=" ">
Id<input type="text" name="id" placeholder="id"  required><br>
Username<input type="text" name="user" placeholder="Useranme" required><br>
Password<input type="password" name="pass" placeholder="Password"required><br>
Role
<select name="urole">
<option value="">Select option</option>
  <option value="A">admin</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select>
<br><input type="submit" name="submit" value="Register">
</form>
</body>
</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('Connection.php');
  class admin {
   

  //     public function insertbyadmin($id,$user,$pass,$role)
  // {
  //     $p = md5($pass);
  //     $sql = $this->conn->prepare("insert into users (id, user, pass, role) values ('$id','$user','$p','$role')");
  //   $aa=$sql->execute();
  //   return $aa;
  // }
  }
  $ad= new admin();
  
  $hashh = rand(10,1000);
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
      $id=$_POST['id'];
      $user=$_POST['user'];
      $role=$_POST['urole'];
      $pass=$_POST['pass'];
  $ad->insertbyadmin($id,$user,$pass,$role);
  }
?>
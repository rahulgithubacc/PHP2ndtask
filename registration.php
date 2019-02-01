<?php
session_start();
$uid=$_SESSION['uid'];
if ($uid && $_SESSION['aid']!='admin')
{
  echo "PLease logout to go to Login Page";
  exit();
}
?>
<html>
<form method="POST" action=" ">
<input type="text" name="id" placeholder="id"  required><br>
<input type="text" name="user" placeholder="Useranme" required><br>
<input type="email" name="email" placeholder="Email" required><br>
<input type="password" name="pass" placeholder="Password"required><br>
<?php
if($_SESSION['aid']=='admin'){?>
Role
<select name="rolee">
<option value="">Select option</option>
<option value="admin">Admin</option>
<option value="normaluser">Normal User</option>
</select>
<br>
<br><input type="submit" name="submit" value="Registration">
</form>
<?php } ?>
<?php
if($_SESSION['aid']!= 'admin'){?>
<input type="submit" name="submit" value="Sign UP">
</form>
<?php } ?>
</body>
</html>
<?php
include ('functions.php');
$obj = new fun();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {   $hashh = rand(0,1000);
        if(isset($_SESSION['aid']))
        {
        if($_SESSION['aid'] == 'admin')
        {
        $ob = $obj->insertbyadmin($_POST['id'],$_POST['user'],$_POST['pass'],$_POST['email'],$_POST['rolee'],$hashh);
        if($ob)
        echo "New user registered";
        else
        echo "Unable to register user"; 
       }
    }
     else
     {
        $ob = $obj->insertbyuser($_POST['id'],$_POST['user'],$_POST['pass'],$_POST['email'],$hashh);
        if($ob)
        echo "New user registered";
        else
        echo "Unable to register user";  
     }
     $em = $obj->Emailfunction($_POST['email'],$hashh);
     if ($em){
         echo "Email has been sent!"; 
}   
}


?> 

<?php
session_start();
$uid=$_SESSION['uid'];
if ($uid)
{
  echo "PLease logout to go to Login Page";
  echo'<a href="logout.php"><button>Logout</button></a>';
  exit();
}
?>
<html>
<body><center>
<u><h2>WELCOME TO MY PHP PAGE<br><br>THIS IS LOGIN PAGE</h2></u>
<form  action="" method="POST">
Id<input type="text" name="id" placeholder="id"  required><br><br>
Password<input type="password" name="pass" placeholder="Password"required><br>
<br><input type="submit" name="submit" value="Log in"><br><br>
<a href="registration.php">Click here to Sign Up</a></center>
</form>
</body>
</html>
<?php
include ('functions.php');
$obj = new fun();
if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
  $_SESSION['aid']="admin";
$ob = $obj->adminchecking($_POST['id'],$_POST['pass']);
if($ob>0)
header('location:welcome.php');
else
{
$ob = $obj->userchecking($_POST['id'],$_POST['pass']);
if($ob>0){
$_SESSION['uid']=$_POST['id'];
header('location:welcomeuser.php');}
else
{
 echo "error";
}
}
}
?>
<html>
<body>

<form  action="" method="POST">
Id<input type="text" name="id" placeholder="id"  required><br>
Password<input type="password" name="pass" placeholder="Password"required><br>

<br><input type="submit" name="submit" value="Log in">
</form>
</body>
</html>


<?php

// include ('Connection.php');
include ('functions.php');
$obj = new fun();
// print_r($_POST['id']);
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id=$_POST['id'];
    // $role=$_GET['urole'];
    $pass=$_POST['pass'];
$ob = $obj->adminchecking($id,$pass);
if($ob>0)
header('location:welcome.php');
else
{
$ob = $obj->userchecking($_POST['id'],$_POST['pass']);
if($ob>0)
header('location:welcomeuser.php');
else
 echo "error"; 
}


}
?>
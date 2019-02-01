<html>
<h1>Registration</h1>
<form method="POST" action=" ">
<input type="text" name="id" placeholder="id"  required><br>
<input type="text" name="user" placeholder="Useranme" required><br>
<input type="password" name="pass" placeholder="Password"required><br>
<input type="email" name="email" placeholder="Email" required><br>
Role
<select name="rolee">
<option value="">Select option</option>
  <option value="admin">admin</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select>
<br>

<input type="submit" name="submit" value="Register">
</body>
<?php
// print_r($_POST['rolee']);
// exit();
include ('functions.php');
$obj = new fun();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $ob = $obj->insertbyadmin($_POST['id'],$_POST['user'],$_POST['pass'],$_POST['email'],$_POST['rolee']);
        if($ob)
        echo "New user registered";
        else
        echo "Unable to register user"; 
        
    }


    

?> 

<html>
<h1>Sign UP</h1>
<form method="POST" action=" ">
<input type="text" name="id" placeholder="id"  required><br>
<input type="text" name="user" placeholder="Useranme" required><br>
<input type="email" name="email" placeholder="Email" required><br>
<input type="password" name="pass" placeholder="Password"required><br>

<input type="submit" name="submit" value="Sign UP">
</body>
</html>
<?php

include ('functions.php');
$obj = new fun();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $ob = $obj->insertbyuser($_POST['id'],$_POST['user'],$_POST['pass'],$_POST['email']);
        if($ob)
        echo "New user registered";
        else
        echo "Unable to register user"; 
        
    }


?> 

<?php 
session_start();
$user = $_SESSION['aid'];
// print_r($user);
if(!$user)
{
    echo "Logout Please";
}
?>
<html>
    <body>
        <center><h1>Welcome!!!!!!!!!!!!!!<br>
        This is admin page</h1></center>
        <a href="registration.php">Click here </a>to register any user with particular role
        <br><br>
        To delete a user type the id <br>
                <form action="" method="post">
        Id<input type="text" name="id" placeholder="id"  required><br>
        <input type="submit" name="submit" value="Delete">
        <?php
        include ('functions.php');
        $obj = new fun();
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
        $id =$_POST['id'];
        $ob = $obj->deleteuser($id);
        if($ob>0)
        echo "Deletion successful";
        else
        echo "Deletion was not successful";
        }
    echo "<br>";
        ?>
        <br>
        <a href="display.php">Click here </a>to display users records.
        <br><br><br>
        <a href="edituser.php">Click here </a>to edit and update users records.
        <br><br><br>
        <a href="logout.php">Click here </a>to logout
    </body>
</html>
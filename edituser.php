<html>
<form method="POST" action=" ">
<input type="text" name="id" value="<?php echo $_GET['id']?>"  readonly><br>
<input type="text" name="user" value="<?php echo $_GET['uname']?>" required><br>
<input type="email" name="email" value="<?php echo $_GET['email']?>" required><br>
<input type="text" name="activate" value="<?php echo $_GET['activeuser']?>"required><br>
<input type="text" name="rolee" value="<?php echo $_GET['roles']?>"required><br>
<input type="submit" name="submit" value="Update">
</html>
<?php
include ('functions.php');
$obj = new fun();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ob = $obj->update($_POST['id'],$_POST['user'],$_POST['email'],$_POST['activate'],$_POST['rolee']);
    if($ob){
        echo "Successfully Update";
    }else{
        echo "Failed Bro!";
    }
}
?>

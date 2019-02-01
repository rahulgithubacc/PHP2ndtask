<html>
<form action="" method="POST">
<select name="disp">
<option value="">Select option</option>
  <option value="admin">Display All the admins</option>
  <option value="all">Display all records</option>
  <option value="B">Display rest</option>
  
</select>

<br>
<input type="submit" name="submit" value="Display">
</form>
</html>
<?php
include ('functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$obj = new fun();

$result=$obj->displayuser($_POST['disp']);
$res=$obj->getcolcnt();
print_r($res);
echo "<table border=2>";
echo "<tr> <th>id</th> <th>user</th> <th>email</th> <th>pass</th> <th>activeuser</th> <th>hashh</th> <th>rolee</th><th>Update Link</th></tr>";
    for ( $row = 0; $row < count($result); $row++ )
    {
        echo "<tr><td>";
        
        for ( $column = 0; $column < $res; $column++ )
        {  
            echo $result[$row][$column];
            echo "<td>";
            if($column==$res - 1){
                echo "<a href=edituser.php?id=".$result[$row][0]."&uname=".$result[$row][1]."&email=".$result[$row][2]."&activeuser=".$result[$row][4]."&roles=".$result[$row][6].">EDIT HERE</a>";
                echo "<td>";
        echo '<td>';}
        }
        echo "</tr>";
    }
echo "</table>";
}    
?>
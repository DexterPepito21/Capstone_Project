<?php 
//update.php
$id = $_GET['updateId'];
$sql = "Select * from 'crud' where id=$id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$name=$row['name'];
<td valea=<?php echo $name?>></td>
if() {
    $sql = "update 'users' set id=$id,name='$id' where id=$id";
}

?>
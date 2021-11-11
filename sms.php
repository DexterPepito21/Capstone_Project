<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "def_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
} else {
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS</title>
</head>
<body>
<form method="post" action="">
    <span>Choose Contact Number</span><br/>
    <!-- <input type="checkbox" name='colour[]' value="Red"> Red <br/>
    <input type="checkbox" name='colour[]' value="Green"> Green <br/>
    <input type="checkbox" name='colour[]' value="Blue"> Blue <br/>
    <input type="checkbox" name='colour[]' value="Black"> Black <br/> -->
    <?php 
            $sql = "SELECT * FROM parent_tbl";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
            $cname = $row['firstname']." ".$row['lastname'];
            ?>
         
            <td><input type="checkbox" name='colour[]' value="<?php echo $cname." ".$row['phonenum']; ?>"><?php echo $cname." ".$row['phonenum']; ?> <br></td>
           
            <?php } ?>
	<br/>
    <input type="submit" value="Submit" name="submit">
</form>

<?php
if(isset($_POST['submit'])){

    if(!empty($_POST['colour'])) {

        foreach($_POST['colour'] as $value){
            echo "Chosen number : ".$value.'<br/>';
        }

    }

}
?>
</body>
</html>
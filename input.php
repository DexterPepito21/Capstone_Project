<?php 
session_start();

include("php/connection.php");
include("php/functions.php");

if(isset($_POST['submit'])){

	$vaccinatorname = $_POST['vaccinatorname'];

  $healthcenter = $_POST['healthcenter'];

  $query = "INSERT INTO healthcare_info (vaccinatorname)
  values ('$vaccinatorname')";
  mysqli_query($con, $query);
  
  $query1 = "INSERT INTO healthcenter_tbl (healthcenter)
  values ('$healthcenter')";
  mysqli_query($con, $query1);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="#"  method="POST">
  <i class="fas fa-user"></i><input type="text"  name="vaccinatorname" placeholder="vaccinatorname"/>
  <i class="fas fa-lock"></i><input type="text"  name="healthcenter" placeholder="healthcenter"/>
  <input type="submit" name="submit" value="Log In">
    </form>

  <select name="bcgvaccinatorname">
    <?php 
    $query = "SELECT * FROM healthcare_info";
    $result = mysqli_query($con,$query);
    while( $rows=mysqli_fetch_assoc($result)){
      $healthcare_id = $rows['healthcare_id'];
      $vaccinatorname = $rows['vaccinatorname'];
      echo "<option value='$healthcare_id'>$vaccinatorname</option>";
    } 
    ?>
  </select>	
  <select name="bcghealthcenter_id">
    <?php  
    $query = "SELECT * FROM healthcenter_tbl";
    $result = mysqli_query($con,$query);                    
    while($rows=mysqli_fetch_assoc($result)){
      $healthcenter_id = $rows['healthcenter_id'];
      $healthcenter = $rows['healthcenter'];
      echo "<option value='$healthcenter_id'>$healthcenter</option>";
    } 
    ?>
  </select>	
  
</body>
</html>
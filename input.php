<?php 
session_start();

	include("php/connection.php");
	include("php/functions.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
  {

		
	$healthcenter = $_POST['healthcenter'];

   
   
		
      $query = "INSERT INTO healthcenter_tbl (healthcenter)
      values ('$healthcenter')";
			mysqli_query($con, $query);

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

      <i class="fas fa-user"></i><input type="text"  name="healthcenter" placeholder="healthcenter"/>
 
      <i class="fas fa-lock"></i><input type="text"  name="password" placeholder="Password"/>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>
</body>
</html>
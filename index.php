<?php 
session_start();

	include("./php/connection.php");
	include("./php/functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $user_data['user_name']; ?>
	<?php echo $user_data['first_name']; ?>
	<?php echo $user_data['last_name']; ?>
	<?php echo $user_data['middle_name']; ?>
	<?php echo $user_data['mother_name']; ?>
	<?php echo $user_data['father_name']; ?>
	<?php echo $user_data['birth_weight']; ?>
	<?php echo $user_data['birth_height']; ?>
	<?php echo $user_data['address']; ?>
	<?php echo $user_data['place_of_birth']; ?>
	<?php echo $user_data['gender']; ?>
	
</body>
</html>
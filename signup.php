<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		//edit
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$middle_name = $_POST['middle_name'];
		$mother_name = $_POST['mother_name'];
		$father_name = $_POST['father_name'];
		$birth_height = $_POST['birth_height'];
		$birth_weight = $_POST['birth_weight'];
		$address = $_POST['address'];
		$place_of_birth = $_POST['place_of_birth'];
		$gender = $_POST['gender'];

	

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,first_name,last_name,middle_name,mother_name,father_name,birth_height,birth_weight,address,place_of_birth,gender) values ('$user_id','$user_name','$password','$first_name','$last_name','$middle_name','$mother_name','$father_name','$birth_height','$birth_weight','$address','$place_of_birth','$gender')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	body{
		background-color: #edf6ff;
		font-family: 'Poppins' , sans-serif;
	}
	#text{

		height: 25px;
		padding: 1px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: #000000;
		background-color: lightblue;
		border: none;
	}

	#box{
		background-color: #6daffe;
		border: 1px solid #ccc;
		box-shadow: 3px 3px 2px #ddd;
		margin-top: 2%;
		width: 25%;
		padding: 20px;
	}
	a{
		text-decoration: none;
		color: #000000;
		float: left;
	}
	</style>

	<center><div id="box">
		<form method="post">
			<div style="font-size: 30px;margin: 10px;color: #000000; text-align: center;">Signup</div>

			<input id="text" type="text" name="user_name" placeholder="username" required><br><br>
			<input id="text" type="password" name="password" placeholder="password" required><br><br>

			<!-- edit starts here -->
			<!-- <input id="text" type="text" name="first_name" placeholder="First name" required><br><br>
			<input id="text" type="text" name="last_name" placeholder="Last name"><br><br>
			<input id="text" type="text" name="middle_name" placeholder="Middle name"><br><br>
			<input id="text" type="text" name="address" placeholder="address"><br><br>
			<input id="text" name="phone_number" placeholder="Phone number"> <br><br>
			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Already have an account? Login!</a><br>
		</form>
	</div></center>
</body>
</html>
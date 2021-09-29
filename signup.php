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
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name" placeholder="username" required><br><br>
			<input id="text" type="password" name="password" placeholder="password" required><br><br>

			<!-- edit starts here -->
			<!-- <input id="text" type="text" name="first_name" placeholder="First name" required><br><br>
			<input id="text" type="text" name="last_name" placeholder="Last name"><br><br>
			<input id="text" type="text" name="middle_name" placeholder="Middle name"><br><br>
			<input id="text" type="text" name="place_of_birth" placeholder="Place of Birth"><br><br>
			<input id="text" type="text" name="address" placeholder="address"><br><br>
			<input id="text" type="text" name="mother_name" placeholder="Mothers name"><br><br>
			<input id="text" type="text" name="father_name" placeholder="Fathers name"><br><br>
			<input id="text" type="text" name="birth_height" placeholder="Birth height"><br><br>
			<input id="text" type="text" name="birth_weight" placeholder="Birth weight"><br><br>
			<input type="radio" name="gender" value="1">male <br>
			<input type="radio" name="gender" value="2">female <br>
			<input type="text" name="phone_number" placeholder="Phone number"> <br> -->

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
<?php 

session_start();

	include("./php/connection.php");
	include("./php/functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
					
						$message = 'Hello!';
                 echo "<SCRIPT>
                     alert('$message')
                     window.location.replace('admin_index.php');
                 </SCRIPT>";
						die;
					}
				}
			}
			
			$message = 'wrong username or password!';
                 echo "<SCRIPT>
                     alert('$message')
                     window.location.replace('login.php');
                 </SCRIPT>";
		}else
		{
			$message = 'wrong username or password!';
                 echo "<SCRIPT>
                     alert('$message')
                     window.location.replace('login.php');
                 </SCRIPT>";
		}
	}

?>
<!-- html -->
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<!-- css -->
	<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');	
	body{
		background-color: #edf6ff;
		font-family: 'Poppins' , sans-serif;
	}
	#text{
		height: 25px;
		padding: 1px;
		border: solid thin #aaa;
		width: 100%;
		font-size: 15px;
	}
	#button{
		padding: 5px;
		width: 70px;
		color: #000000;
		background-color: lightblue;
		border: none;
	}
	#box{
		background-color: #6daffe;
		border: 1px solid #ccc;
		box-shadow: 3px 3px 2px #ddd;
		margin-top: 10%;
		width: 20%;
		padding: 20px;
	}
	.container{
		text-align: left;
		font-size: 15px;
		margin-top: 5px;
	}
	a{
		text-decoration: none;
		color: #000000;
	}
	</style>
	<center><div id="box">
		<form method="post">
			<div style="font-size: 20px;">Login</div>
			<div class="container">
			Username<input id="text" type="text" name="user_name"><br><br>
			Password<input id="text" type="password" name="password"><br><br>
		    	
			<input id="button" type="submit" value="Login"><br><br>
			<a href="forgotpassword.php">Forgot password?</a><br>
			<a href="signup.php">Register here!</a><br>
		</form>
		</div>
</div></center>
</body>
</html>
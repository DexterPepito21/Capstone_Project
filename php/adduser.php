
<?php 
session_start();

	include("connection.php");
	include("functions.php");
	if(isset($_POST['insertdata']))
	{
		//something was posted
		$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $address = $_POST['address'];
    $phone_num = $_POST['phone_num'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

		
			$user_id = random_num(20);
			$query = "INSERT INTO users (user_id,user_name,password)
			values ('$user_id','$user_name','$password')";
			$result=mysqli_query($con, $query);

			
			header("Location: ../admin_chart.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	  }

  
?>
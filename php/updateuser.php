
<?php 
session_start();

	include("connection.php");
	include("functions.php");
	if(isset($_POST['update']))
	{
		//something was posted
    $id = $_POST['id'];
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
			$query = "INSERT INTO users (id,user_name,password,first_name,last_name,middle_name)
			values ('$id','$user_name','$password','$first_name','$last_name','$middle_name')
            ON DUPLICATE KEY UPDATE first_name='$first_name', last_name='$last_name', middle_name='$middle_name'";
			$result=mysqli_query($con, $query);

			
			header("Location: ../admin_chart.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	  }

  
?>
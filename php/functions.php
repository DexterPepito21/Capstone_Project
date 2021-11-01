<?php
include("connection.php");

function check_login($con)
{

	if(isset($_SESSION['parent_id']))
	{

		$parent_id = $_SESSION['parent_id'];
		$query = "SELECT * FROM parent_tbl where parent_id = '$parent_id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	
	

	//redirect to login
	// header("Location: ../admin_login&signup.php");
	// die;

}
function child($con)
{

	if(isset($_SESSION['parent_id']))
	{

		$parent_id = $_SESSION['parent_id'];
		$query = "SELECT * FROM child_tbl where parent_id = '$parent_id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$child_data = mysqli_fetch_assoc($result);
			return $child_data;
		}
	}

}

function healthcenter($con)
{

	
	
		$query = "SELECT * FROM healthcenter_tbl";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$hcdata = mysqli_fetch_assoc($result);
			return $hcdata;
		}
	

}

function chart($con)
{

	
	if(isset($_SESSION['child_id'])){

		$child_id = $_SESSION['child_id'];
		$query = "SELECT * FROM chart where child_id = '$child_id' limit 1";
	  
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
	  
		  $child_data = mysqli_fetch_assoc($result);
		  return $child_data;
		}
	  }
	

}
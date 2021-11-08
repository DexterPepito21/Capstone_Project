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
	// redirect to login
	header("Location: ./index.php");
	die;

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

	
	if(isset($_SESSION['parent_id'])){

		$parent_id = $_SESSION['parent_id'];
		$query = "SELECT * FROM child_tbl where parent_id = '$parent_id'";
	  
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
	  
		  $child_data = mysqli_fetch_assoc($result);
		  return $child_data;
		}
	  }
	

}
function encryptthis($data, $key) {
	$encryption_key = base64_decode($key);  
	$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length("aes-256-cbc"));  
	$encrypted = openssl_encrypt($data, "aes-256-cbc", $encryption_key, 0, $iv);  
	return base64_encode($encrypted . "::" . $iv);  
	}
  
  function decryptthis($data, $key) {
	$encryption_key = base64_decode($key);    
	list($encrypted_data, $iv) = array_pad(explode("::", base64_decode($data), 2),2,null);    
	return openssl_decrypt($encrypted_data, "aes-256-cbc", $encryption_key, 0, $iv);   
	}
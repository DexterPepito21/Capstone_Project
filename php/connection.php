<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}

//  $con = new mysqli('localhost','root','','login_sample_db');

//  if(!$con) {
// 	 die(mysqli_error($con));
//  }

?>

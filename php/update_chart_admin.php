<?php 
//update.php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

if(isset($_POST['update'])){
	$chart_id = $_POST['chart_id'];
	$vaccine_id = $_POST['vaccine_id'];
	$vaccinatorname = $_POST['vaccinatorname'];
	$dateofvaccination = $_POST['dateofvaccination'];
    $healthcenter = $_POST['healthcenter'];
	$vaccinated = $_POST['vaccinated'];
	
	$sql = "UPDATE chart SET vaccine_id='$vaccine_id', healthcare_id='$vaccinatorname', dateofvaccination='$dateofvaccination',healthcenter_id='$healthcenter',vaccinated='$vaccinated' where chart_id = '$chart_id'";
	$result = mysqli_query($con, $sql);

	header("Location: ../admin_chart.php");

	}

?>
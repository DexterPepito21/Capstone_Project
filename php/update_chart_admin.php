<?php 
//update.php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

if(isset($_POST['update'])){
	$chart_id = $_POST['chart_id'];
	$vaccine_id = $_POST['vaccine_id'];
	$dose = $_POST['dose'];
	$vaccinatorname = $_POST['vaccinatorname'];
	$dateofvaccination = $_POST['dateofvaccination'];
    $healthcenter = $_POST['healthcenter'];
	$vaccinated = $_POST['vaccinated'];
	
	$sql = "UPDATE chart SET vaccine_id='$vaccine_id',dose='$dose' , healthcare_id='$vaccinatorname', dateofvaccination='$dateofvaccination',healthcenter_id='$healthcenter',vaccinated='$vaccinated' where chart_id = '$chart_id'";
	$result = mysqli_query($con, $sql);

	header("Location: ../admin_chart.php");

	}

?>
<?php 
//update.php

include("connection.php");

if(isset($_POST['submit'])){
	$child_id = $_POST['child_id'];
	$vaccine_id = $_POST['vaccine_id'];
	$dose = $_POST['dose'];
	$vaccinatorname = $_POST['vaccinatorname'];
	$dateofvaccination = $_POST['dateofvaccination'];
    $healthcenter = $_POST['healthcenter'];
	$vaccinated = $_POST['vaccinated'];
	
	$sql = "INSERT INTO chart (child_id,vaccine_id,dose,healthcare_id,dateofvaccination,healthcenter_id,vaccinated)
	values 
	('$child_id','$vaccine_id','$dose','$vaccinatorname','$dateofvaccination','$healthcenter','$vaccinated')
	";
	$result = mysqli_query($con, $sql);

	header("Location: ../admin_chart.php");
	if($mmrresult2 && $mmrresult ){
		
	}else {
		die(mysqli_error($con));
	}
}


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


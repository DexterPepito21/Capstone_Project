<?php 
//update.php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

if(isset($_POST['submit'])){
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
}
exit();
if(isset($_POST['submit'])){
	
	$child_id = $_POST['child_id'];
	$bcgvaccine_id = 1;
    $bcg1st = $_POST['bcg1st'];
    $bcgvaccinatorname = $_POST['bcgvaccinatorname'];
    $bcghealthcenter = $_POST['bcghealthcenter'];
	$bcgvaccinated = $_POST['bcgvaccinated'];

	$hepatitisvaccine_id = 2;
	$hepatitis1st = $_POST['hepatitis1st'];
    $hepatitisvaccinatorname = $_POST['hepatitisvaccinatorname'];
    $hepatitishealthcenter = $_POST['hepatitishealthcenter'];
	$hepatitisvaccinated = $_POST['hepatitisvaccinated'];

	$pentavalentvaccine_id = 3;
	$pentavalent1st = $_POST['pentavalent1st'];
	$pentavalent2nd = $_POST['pentavalent2nd'];
	$pentavalent3rd = $_POST['pentavalent3rd'];
    $pentavalentvaccinatorname1st = $_POST['pentavalentvaccinatorname1st'];
	$pentavalentvaccinatorname2nd = $_POST['pentavalentvaccinatorname2nd'];
	$pentavalentvaccinatorname3rd = $_POST['pentavalentvaccinatorname3rd'];
    $pentavalenthealthcenter1st = $_POST['pentavalenthealthcenter1st'];
    $pentavalenthealthcenter2nd = $_POST['pentavalenthealthcenter2nd'];
    $pentavalenthealthcenter3rd = $_POST['pentavalenthealthcenter3rd'];
	$pentavalentvaccinated1st = $_POST['pentavalentvaccinated1st'];
	$pentavalentvaccinated2nd = $_POST['pentavalentvaccinated2nd'];
	$pentavalentvaccinated3rd = $_POST['pentavalentvaccinated3rd'];

	$opvvaccine_id = 4;
	$opv1st = $_POST['opv1st'];
	$opv2nd = $_POST['opv2nd'];
	$opv3rd = $_POST['opv3rd'];
    $opvvaccinatorname1st = $_POST['opvvaccinatorname1st'];
	$opvvaccinatorname2nd = $_POST['opvvaccinatorname2nd'];
	$opvvaccinatorname3rd = $_POST['opvvaccinatorname3rd'];
    $opvhealthcenter1st = $_POST['opvhealthcenter1st'];
    $opvhealthcenter2nd = $_POST['opvhealthcenter2nd'];
    $opvhealthcenter3rd = $_POST['opvhealthcenter3rd'];
	$opvvaccinated1st = $_POST['opvvaccinated1st'];
	$opvvaccinated2nd = $_POST['opvvaccinated2nd'];
	$opvvaccinated3rd = $_POST['opvvaccinated3rd'];

	$inactivepolio1stvaccine_id = 5;
	$inactivepolio1st = $_POST['inactivepolio1st'];
    $inactivepoliovaccinatorname = $_POST['inactivepoliovaccinatorname'];
    $inactivepoliohealthcenter = $_POST['inactivepoliohealthcenter'];
	$inactivepolio1stvaccinated = $_POST['inactivepolio1stvaccinated'];
	
	$pneumococcalvaccine_id = 6;
	$pneumococcal1st = $_POST['pneumococcal1st'];
	$pneumococcal2nd = $_POST['pneumococcal2nd'];
	$pneumococcal3rd = $_POST['pneumococcal3rd'];
    $pneumococcalvaccinatorname1st = $_POST['pneumococcalvaccinatorname1st'];
	$pneumococcalvaccinatorname2nd = $_POST['pneumococcalvaccinatorname2nd'];
	$pneumococcalvaccinatorname3rd = $_POST['pneumococcalvaccinatorname3rd'];
    $pneumococcalhealthcenter1st = $_POST['pneumococcalhealthcenter1st'];
    $pneumococcalhealthcenter2nd = $_POST['pneumococcalhealthcenter2nd'];
    $pneumococcalhealthcenter3rd = $_POST['pneumococcalhealthcenter3rd'];
	$pneumococcalvaccinated1st = $_POST['pneumococcalvaccinated1st'];
	$pneumococcalvaccinated2nd = $_POST['pneumococcalvaccinated2nd'];
	$pneumococcalvaccinated3rd = $_POST['pneumococcalvaccinated3rd'];


	$sql = "INSERT INTO chart (child_id,vaccine_id,healthcare_id,dateofvaccination,healthcenter_id)
	values 
	('$child_id','$bcgvaccine_id','$bcgvaccinatorname','$bcg1st','$bcghealthcenter'),
	('$child_id','$hepatitisvaccine_id','$hepatitisvaccinatorname','$hepatitis1st','$hepatitishealthcenter'),
	('$child_id','$pentavalentvaccine_id','$pentavalentvaccinatorname1st','$pentavalent1st','$pentavalenthealthcenter1st'),
	('$child_id','$pentavalentvaccine_id','$pentavalentvaccinatorname2nd','$pentavalent2nd','$pentavalenthealthcenter2nd'),
	('$child_id','$pentavalentvaccine_id','$pentavalentvaccinatorname3rd','$pentavalent3rd','$pentavalenthealthcenter3rd'),
	('$child_id','$opvvaccine_id','$opvvaccinatorname1st','$opv1st','$opvhealthcenter1st'),
	('$child_id','$opvvaccine_id','$opvvaccinatorname2nd','$opv2nd','$opvhealthcenter2nd'),
	('$child_id','$opvvaccine_id','$opvvaccinatorname3rd','$opv3rd','$opvhealthcenter3rd'),
	('$child_id','$inactivepolio1stvaccine_id','$inactivepoliovaccinatorname','$inactivepolio1st','$inactivepoliohealthcenter'),
	('$child_id','$pneumococcalvaccine_id','$pneumococcalvaccinatorname1st','$pneumococcal1st','$pneumococcalhealthcenter1st'),
	('$child_id','$pneumococcalvaccine_id','$pneumococcalvaccinatorname2nd','$pneumococcal2nd','$pneumococcalhealthcenter2nd'),
	('$child_id','$pneumococcalvaccine_id','$pneumococcalvaccinatorname3rd','$pneumococcal3rd','$pneumococcalhealthcenter3rd')

	ON DUPLICATE KEY UPDATE  
	healthcare_id='$bcgvaccinatorname', dateofvaccination='$bcg1st',healthcenter_id='$bcghealthcenter',
	healthcare_id='$hepatitisvaccinatorname', dateofvaccination='$hepatitis1st',healthcenter_id='$hepatitishealthcenter',
	healthcare_id='$pentavalentvaccinatorname1st', dateofvaccination='$pentavalent1st',healthcenter_id='$pentavalenthealthcenter1st',
	healthcare_id='$pentavalentvaccinatorname2nd', dateofvaccination='$pentavalent2nd',healthcenter_id='$pentavalenthealthcenter2nd',
	healthcare_id='$pentavalentvaccinatorname3rd', dateofvaccination='$pentavalent3rd',healthcenter_id='$pentavalenthealthcenter3rd',
	healthcare_id='$opvvaccinatorname1st', dateofvaccination='$opv1st',healthcenter_id='$opvhealthcenter1st',
	healthcare_id='$opvvaccinatorname2nd', dateofvaccination='$opv2nd',healthcenter_id='$opvhealthcenter2nd',
	healthcare_id='$opvvaccinatorname3rd', dateofvaccination='$opv3rd',healthcenter_id='$opvhealthcenter3rd',
	healthcare_id='$inactivepoliovaccinatorname', dateofvaccination='$inactivepolio1st',healthcenter_id='$inactivepoliohealthcenter',
	healthcare_id='$pneumococcalvaccinatorname1st', dateofvaccination='$pneumococcal1st',healthcenter_id='$pneumococcalhealthcenter1st',
	healthcare_id='$pneumococcalvaccinatorname2nd', dateofvaccination='$pneumococcal2nd',healthcenter_id='$pneumococcalhealthcenter2nd',
	healthcare_id='$pneumococcalvaccinatorname3rd', dateofvaccination='$pneumococcal3rd',healthcenter_id='$pneumococcalhealthcenter3rd'
	";
	$result = mysqli_query($con, $sql);





	$mmrvaccine_id = 7;
	$mmr1st = $_POST['mmr1st'];
	$mmr2nd = $_POST['mmr2nd'];
    $mmrvaccinatorname1st = $_POST['mmrvaccinatorname1st'];
	$mmrvaccinatorname2nd = $_POST['mmrvaccinatorname2nd'];
    $mmrhealthcenter1st = $_POST['mmrhealthcenter1st'];
    $mmr_health_center_2nd = $_POST['mmr_health_center_2nd'];

	$sqlmmr1st = "INSERT INTO chart (child_id,vaccine_id,healthcare_id,dateofvaccination,healthcenter_id)
	values ('$child_id','$mmrvaccine_id','$mmrvaccinatorname1st','$mmr1st','$mmrhealthcenter1st') 
	ON DUPLICATE KEY UPDATE  healthcare_id='$bcgvaccinatorname', dateofvaccination='$bcg1st',healthcenter_id='$bcghealthcenter'";
	$mmrresult = mysqli_query($con, $sqlmmr1st);
	
	$sqlmmr2nd = "INSERT INTO chart (child_id,vaccine_id,healthcare_id,dateofvaccination,healthcenter_id)
	values ('$child_id','$mmrvaccine_id','$mmrvaccinatorname2nd','$mmr2nd','$mmrhealthcenter2nd') 
	ON DUPLICATE KEY UPDATE  healthcare_id='$bcgvaccinatorname', dateofvaccination='$bcg1st',healthcenter_id='$bcghealthcenter'";
	$mmrresult2 = mysqli_query($con, $sqlmmr2nd);


	header("Location: ../admin_chart.php");
	if($mmrresult2 && $mmrresult ){
		
	}else {
		die(mysqli_error($con));
	}
}

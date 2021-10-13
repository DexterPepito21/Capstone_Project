<?php 
//update.php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);
$id = $user_data['id'];

if(isset($_POST['submit'])){
    $bcg_1st = $_POST['bcg_1st'];
    $bcg_vaccinator_name = $_POST['bcg_vaccinator_name'];
    $bcg_health_center = $_POST['bcg_health_center'];

	$sql = "INSERT INTO users (id,bcg_1st,bcg_vaccinator_name,bcg_health_center)
	values ('$id','$bcg_1st','$bcg_vaccinator_name','$bcg_health_center') 
	ON DUPLICATE KEY UPDATE bcg_1st='$bcg_1st', bcg_vaccinator_name='$bcg_vaccinator_name',bcg_health_center='$bcg_health_center'";
	$result1 = mysqli_query($con, $sql_bcg);


	$hepatitis_1st = $_POST['hepatitis_1st'];
    $hepatitis_vaccinator_name = $_POST['hepatitis_vaccinator_name'];
    $hepatitis_health_center = $_POST['hepatitis_health_center'];

	$sql_hepatitis = "update 'bcg' set id=$id, hepatitis_1st='$hepatitis_1st', hepatitis_vaccinator_name='$hepatitis_vaccinator_name',hepatitis_health_center='$hepatitis_health_center', where id=$id";
	$result2 = mysqli_query($con, $sql_hepatitis);

	$pentavalent_1st = $_POST['pentavalent_1st'];
	$pentavalent_2nd = $_POST['pentavalent_2nd'];
	$pentavalent_3rd = $_POST['pentavalent_3rd'];
    $pentavalent_vaccinator_name_1st = $_POST['pentavalent_vaccinator_name_1st'];
	$pentavalent_vaccinator_name_2nd = $_POST['pentavalent_vaccinator_name_2nd'];
	$pentavalent_vaccinator_name_3rd = $_POST['pentavalent_vaccinator_name_3rd'];
    $pentavalent_health_center_1st = $_POST['pentavalent_health_center_1st'];
    $pentavalent_health_center_2nd = $_POST['pentavalent_health_center_2nd'];
    $pentavalent_health_center_3rd = $_POST['pentavalent_health_center_3rd'];

	$sql_pentavalent = "update 'bcg' set id=$id, pentavalent_1st='$pentavalent_1st', pentavalent_2nd='$pentavalent_2nd',pentavalent_3rd='$pentavalent_3rd', pentavalent_vaccinator_name_1st='$pentavalent_vaccinator_name_1st', pentavalent_vaccinator_name_2nd='$pentavalent_vaccinator_name_2nd', pentavalent_vaccinator_name_3rd='$pentavalent_vaccinator_name_3rd',pentavalent_health_center_1st='$pentavalent_health_center_1st', pentavalent_health_center_2nd='$pentavalent_health_center_2nd',pentavalent_health_center_3rd='$pentavalent_health_center_3rd', where id=$id";
	$result3 = mysqli_query($con, $sql_pentavalent);


	$opv_1st = $_POST['opv_1st'];
	$opv_2nd = $_POST['opv_2nd'];
	$opv_3rd = $_POST['opv_3rd'];
    $opv_vaccinator_name_1st = $_POST['opv_vaccinator_name_1st'];
	$opv_vaccinator_name_2nd = $_POST['opv_vaccinator_name_2nd'];
	$opv_vaccinator_name_3rd = $_POST['opv_vaccinatoropv_name_3rd'];
    $opv_health_center_1st = $_POST['opv_health_center_1st'];
    $opv_health_center_2nd = $_POST['opv_health_center_2nd'];
    $opv_health_center_3rd = $_POST['opv_health_center_3rd'];

	$sql_opv = "update 'bcg' set id=$id, opv_1st='$opv_1st', opv_2nd='$opv_2nd',opv_3rd='$opv_3rd', opv_vaccinator_name_1st='$opv_vaccinator_name_1st', opv_vaccinator_name_2nd='$opv_vaccinator_name_2nd', opv_vaccinator_name_3rd='$opv_vaccinator_name_3rd',opv_health_center_1st='$opv_health_center_1st', opv_health_center_2nd='$opv_health_center_2nd',opv_health_center_3rd='$opv_health_center_3rd', where id=$id";
	$result4 = mysqli_query($con, $sql_opv);


	$inactive_polio_1st = $_POST['inactive_polio_1st'];
    $inactive_polio_vaccinator_name = $_POST['inactive_polio_vaccinator_name'];
    $inactive_polio_health_center = $_POST['inactive_polio_health_center'];

	$sql_inactive_polio = "update 'bcg' set id=$id, inactive_polio_1st='$inactive_polio_1st', inactive_polio_vaccinator_name='$inactive_polio_vaccinator_name',inactive_polio_health_center='$inactive_polio_health_center', where id=$id";
	$result5 = mysqli_query($con, $sql_inactive_polio);


	$pneumococcal_1st = $_POST['pneumococcal_1st'];
	$pneumococcal_2nd = $_POST['pneumococcal_2nd'];
	$pneumococcal_3rd = $_POST['pneumococcal_3rd'];
    $pneumococcal_vaccinator_name_1st = $_POST['pneumococcal_vaccinator_name_1st'];
	$pneumococcal_vaccinator_name_2nd = $_POST['pneumococcal_vaccinator_name_2nd'];
	$pneumococcal_vaccinator_name_3rd = $_POST['pneumococcal_vaccinator_name_3rd'];
    $pneumococcal_health_center_1st = $_POST['pneumococcal_health_center_1st'];
    $pneumococcal_health_center_2nd = $_POST['pneumococcal_health_center_2nd'];
    $pneumococcal_health_center_3rd = $_POST['pneumococcal_health_center_3rd'];

	$sql_pneumococcal = "update 'bcg' set id=$id, pneumococcal_1st='$pneumococcal_1st', pneumococcal_2nd='$pneumococcal_2nd',pneumococcal_3rd='$pneumococcal_3rd', pneumococcal_vaccinator_name_1st='$pneumococcal_vaccinator_name_1st', pneumococcal_vaccinator_name_2nd='$pneumococcal_vaccinator_name_2nd', pneumococcal_vaccinator_name_3rd='$pneumococcal_vaccinator_name_3rd',pneumococcal_health_center_1st='$pneumococcal_health_center_1st', pneumococcal_health_center_2nd='$pneumococcal_health_center_2nd',pneumococcal_health_center_3rd='$pneumococcal_health_center_3rd', where id=$id";
	$result6 = mysqli_query($con, $sql_pneumococcal);


	$mmr_1st = $_POST['mmr_1st'];
	$mmr_2nd = $_POST['mmr_2nd'];
    $mmr_vaccinator_name_1st = $_POST['mmr_vaccinator_name_1st'];
	$mmr_vaccinator_name_2nd = $_POST['mmr_vaccinator_name_2nd'];
    $mmr_health_center_1st = $_POST['mmr_health_center_1st'];
    $mmr_health_center_2nd = $_POST['mmr_health_center_2nd'];

	$sql_mmr = "update 'bcg' set id=$id, mmr_1st='$mmr_1st', mmr_2nd='$mmr_2nd', mmr_vaccinator_name_1st='$mmr_vaccinator_name_1st', mmr_vaccinator_name_2nd='$mmr_vaccinator_name_2nd',mmr_health_center_1st='$mmr_health_center_1st', mmr_health_center_2nd='$mmr_health_center_2nd', where id=$id";
	$result7 = mysqli_query($con, $sql_mmr);




	$sql_bcg = "update 'bcg' set id=$id, bcg_1st='$bcg_1st', where id=$id";
	$result = mysqli_query($con, $sql);

	if($result){
		echo "Update succesfull";
	}else {
		die(mysqli_error($con));
	}
}
?>
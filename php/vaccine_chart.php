<?php 
//update.php
session_start();

include("connection.php");
include("functions.php");
$id = $user_data['id'];

if(isset($_POST['submit'])){
    $bcg_1st = $_POST['bcg_1st'];
    $bcg_vaccinator_name = $_POST['bcg_vaccinator_name'];
    //put here the vaccina

	$sql = "update 'users' set id=$id, first_name='$first_name', last_name='$last_name',middle_name='$middle_name',address='$address',phone_num='$phone_num', mother_name='$mother_name',father_name='$father_name',birth_weight='$birth_weight',birth_height='$birth_height',place_of_birth='$place_of_birth',date_of_birth='$date_of_birth', where id=$id";
	$result = mysqli_query($con, $sql);

	if($result){
		echo "Update succesfull";
	}else {
		die(mysqli_error($con));
	}
}
?>
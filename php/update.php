<?php 
//update.php
session_start();

include("connection.php");
include("functions.php");
$id = $user_data['id'];

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $address = $_POST['address'];
    $phone_num = $_POST['phone_num'];
	$mother_name = $_POST['mother_name'];
	$father_name = $_POST['father_name'];
	$birth_height = $_POST['birth_height'];
	$birth_weight = $_POST['birth_weight'];
    $place_of_birth = $_POST['place_of_birth'];
    $date_of_birth = $_POST['date_of_birth'];

	$sql = "update 'users' set id=$id, first_name='$first_name', last_name='$last_name',middle_name='$middle_name',address='$address',phone_num='$phone_num', mother_name='$mother_name',father_name='$father_name',birth_weight='$birth_weight',birth_height='$birth_height',place_of_birth='$place_of_birth',date_of_birth='$date_of_birth', where id=$id";
	$result = mysqli_query($con, $sql);

	if($result){
		echo "Update succesfull";
	}else {
		die(mysqli_error($con));
	}
}
?>
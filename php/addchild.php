<?php 
//update.php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
$child_data = child($con);

$parent_id = $user_data['parent_id'];


if(isset($_POST['submit'])){
  $child_id = $child_data['child_id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $middlename = $_POST['middlename'];
  $dateofbirth = $_POST['dateofbirth'];
  $placeofbirth = $_POST['placeofbirth'];
  $address = $_POST['address'];
  $fathername = $_POST['fathername'];
  $mothername = $_POST['mothername'];
  $birthheight = $_POST['birthheight'];
  $birthweight = $_POST['birthweight'];
  $sex = $_POST['sex'];

  $sql = "INSERT INTO child_tbl (child_id,parent_id,firstname,lastname,middlename,dateofbirth,placeofbirth,address,fathername,mothername,birthheight,birthweight,sex)
  values ('$child_id','$parent_id','$firstname','$lastname','$middlename','$dateofbirth','$placeofbirth','$address','$fathername','$mothername','$birthheight','$birthweight','$sex') 
  ON DUPLICATE KEY UPDATE firstname='$firstname', lastname='$lastname', middlename='$middlename', dateofbirth='$dateofbirth', placeofbirth='$placeofbirth', address='$address',fathername='$fathername', mothername='$mothername', birthheight='$birthheight', birthweight='$birthweight', sex='$sex'";

  $result = mysqli_query($con, $sql);

	if($result){
    $_SESSION['child_id'] = $child_data['child_id'];
    header("Location: ../parent_child.php");
	}else {
		die(mysqli_error($con));
	}


}
?>
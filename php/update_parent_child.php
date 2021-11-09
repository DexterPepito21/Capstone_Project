<?php 
//update.php

include("connection.php");

$parent_id = $user_data['parent_id'];

if(isset($_POST['update'])){
  $child_id = $_POST['child_id'];
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

  $sql = "UPDATE child_tbl SET firstname='$firstname', lastname='$lastname', middlename='$middlename', dateofbirth='$dateofbirth', placeofbirth='$placeofbirth', address='$address',fathername='$fathername', mothername='$mothername', birthheight='$birthheight', birthweight='$birthweight', sex='$sex' where child_id='$child_id'";
  $result = mysqli_query($con, $sql);

  header("Location: ../parent_child.php");

}
?>
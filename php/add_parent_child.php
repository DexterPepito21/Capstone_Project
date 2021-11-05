<?php 
// adding child in parent_child.php

include("connection.php");

if(isset($_POST['add'])){
    $parent_id = $_POST['parent_id'];
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
  
    $sql = "INSERT INTO child_tbl (parent_id,firstname,lastname,middlename,dateofbirth,placeofbirth,address,fathername,mothername,birthheight,birthweight,sex)
    values ('$parent_id','$firstname','$lastname','$middlename','$dateofbirth','$placeofbirth','$address','$fathername','$mothername','$birthheight','$birthweight','$sex')";

    $result = mysqli_query($con, $sql);
  
    header("Location: ../parent_child.php");
  
  }
?>


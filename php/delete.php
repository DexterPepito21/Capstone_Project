<?php
session_start();

include("connection.php");
include("functions.php");


if(isset($_POST['delete_btn'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id='$id'";
    $result = mysqli_query($con,$sql);
    if($result) {
        echo "deleted succesfully";
        header('location:admin_chart.php');
    }else{
        die(mysqli_error($con));
    }
}

 ?>
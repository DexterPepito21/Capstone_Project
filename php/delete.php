<?php
session_start();

include("connection.php");
include("functions.php");


if(isset($_POST['delete_btn'])) {
    $child_id = $_POST['child_id'];
    $sql = "DELETE FROM chart WHERE child_id='$child_id'";
    $result = mysqli_query($con,$sql);
    if($result) {
        echo "deleted succesfully";
        header('location:../admin_chart.php');
    }else{
        die(mysqli_error($con));
    }
}

 ?>
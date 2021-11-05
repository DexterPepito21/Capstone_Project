<?php
session_start();

include("connection.php");
include("functions.php");

if(isset($_POST['delete_child'])) {
    $child_id = $_POST['child_id'];
    // deleting child
    $sql = "DELETE FROM child_tbl WHERE child_id='$child_id'";
    $result = mysqli_query($con,$sql);
    // deleting all child chart 
    $sql1 = "DELETE FROM chart WHERE child_id='$child_id'";
    $result1 = mysqli_query($con,$sql1);
    if($result) {
        echo "deleted succesfully";
        header('location:../admin_chart.php');
    }else{
        die(mysqli_error($con));
    }
}

if(isset($_POST['delete_chart'])) {
    $chart_id = $_POST['chart_id'];
    $sql = "DELETE FROM chart WHERE chart_id='$chart_id'";
    $result = mysqli_query($con,$sql);
    if($result) {
        echo "deleted succesfully";
        header('location:../admin_chart.php');
    }else{
        die(mysqli_error($con));
    }
}

 ?>
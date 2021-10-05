<?php
//delete.php
if(isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];

    $sql = "delte from 'users' where id=$id";
    $result = mysqli_query($con,$sql);
    if($result) {
        echo "deleted succesfully";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}

 ?>
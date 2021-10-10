<?php 
session_start();

include("php/connection.php");
include("php/functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $address = $_POST['address'];
    $phone_num = $_POST['phone_num'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $errors = array();

    $user_nameErr = "SELECT user_name FROM users WHERE username='$user_name'";
    $user_nameErrResult = mysqli_query($con,$user_nameErr);

    



    if (empty($first_name)) {
      $errors['fn'] = "Username Requires";
    }else if(mysqli_num_rows($user_nameErrResult > 0)) {
        $errors['fn'] = "username exist";
    }
    if (empty($first_name)) {
      $errors['fn'] = "Username Requires";
    }
    if (empty($first_name)) {
      $errors['fn'] = "Username Requires";


      
    }
}

?>
 <p style="color:red;"><?php if(issset($errors['fn'])) echo $errors['fn'];?></p>
 
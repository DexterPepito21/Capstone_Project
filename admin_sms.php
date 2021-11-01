<?php 
session_start();

include("php/connection.php");
include("php/functions.php");

$user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS Notification | Admin</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin_sms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    
</head>
<body>
      <!-- Navigation Bar -->
     <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Child Care System</label>
        <ul>
          <li><a href="admin_index.php"><i class="fas fa-home" id="icon"></i>Dashboard</a></li>
          <li><a href="admin_input.php"><i class="fas fa-book"  id="icon"></i>Input</a></li>
          <li><a href="admin_chart.php"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
          <li><a href="admin_sms.php" class="active"><i class="fas fa-comment"  id="icon"></i>SMS Notification</a></li>
        
          <div class="dropdown">
            <button class="dropbtn"><i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
            <a href="php/logout.php"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
            </div>
          </div>
        </ul>
      </nav>

      <div class="container">
      <i class="fa fa-arrow-circle-right"></i><a href="http://sms.onewaysms.ph/">Click this to send SMS Notification</a>
</div>
    </body>
</html>
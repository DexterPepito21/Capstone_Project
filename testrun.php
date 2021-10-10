<?php 
//update.php
session_start();

include("php/connection.php");
include("php/functions.php");


if(isset($_POST['submit'])){

    $bcg_1st = $_POST['bcg_1st'];
    $bcg_vaccinator_name = $_POST['bcg_vaccinator_name'];
    $bcg_health_center = $_POST['bcg_health_center'];

	$sql_bcg = "update 'bcg' set id=$id, bcg_1st='$bcg_1st', bcg_vaccinator_name='$bcg_vaccinator_name',bcg_health_center='$bcg_health_center', where id=$id";
	$result1 = mysqli_query($con, $sql_bcg);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Profile | Parent</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link rel="stylesheet" href="./css/parent_child.css">
</head>
<body>Hello, <?php echo $user_data['id']; ?>
  <!-- Navigation Bar -->
        <nav>
          <input type="checkbox" id="check">
          <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
          </label>
          <label class="logo">Child Care System</label>
          <ul>
            <li><a href="parent_index.php"><i class="fas fa-home" id="icon"></i>Dashboard</a></li>
            <li><a href="parent_child.php" class="active"><i class="fas fa-child"  id="icon"></i>Child Profile</a></li>
            <li><a href="parent_chart.php"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
            <li><a href="parent_guide.php"><i class="fas fa-book"  id="icon"></i>Nutrition Guide</a></li>
                      
            <div class="dropdown">
              <button class="dropbtn"><i class="fa fa-caret-down"></i></button>
              <div class="dropdown-content">
              <a href="./php/logout.php"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
              </div>
            </div>
          </ul>
        </nav>
<!-- Forms -->
<h2><i class="fa fa-child"></i>Profile</h2>
<!--Step 1:Adding HTML-->
<form class="form-inline" action="#" method="post"  style="border:1px solid #ccc">
  <div class="container">
      <label for="email" class="label">Child's Name:</label>
      <input type="text" id="email"   name="bcg_1st" value=<?php echo $user_data['bcg_1st'];   ?>>
      <input type="text" id="email"   name="bcg_vaccinator_name" value=<?php echo $user_data['bcg_vaccinator_name'];   ?>>
      <input type="text" id="email"   name="bcg_health_center" value=<?php echo $user_data['bcg_health_center'];   ?>>
  
      
<br>
<br>
        <div class="clearfix">
            <button type="submit" class="signupbtn" name="submit">Update</button>
        </div>
    </div>
  </div>
</form>
</body>
</html>
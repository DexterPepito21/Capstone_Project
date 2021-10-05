<?php 
session_start();

include("./php/connection.php");
include("./php/functions.php");

$user_data = check_login($con);
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
              <a href="#"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
              </div>
            </div>
          </ul>
        </nav>
<!-- Forms -->
<h2><i class="fa fa-child"></i>Profile</h2>
<!--Step 1:Adding HTML-->
<form class="form-inline" action="/action_page.php"  style="border:1px solid #ccc">
  <div class="container">
      <label for="email" class="label">Child's Name:</label>
      <input type="text" id="email"   name="email" value=<?php echo $user_data['first_name']; echo $user_data['middle_name']; echo $user_data['last_name'];  ?>>
  <br>
    <label for="email" class="label">Date of Birth:</label>
    <input type="text" id="email"   name="email" value=<?php echo $user_data['date_of_birth']; ?>>

    <label for="pwd" class="label">Place of Birth:</label>
    <input type="text" id="pwd"  name="pswd" value=<?php echo $user_data['place_of_birth']; ?>>
  <br>
    <label for="email" class="label">Address:</label>
    <input type="text" id="email"   name="email" value=<?php echo $user_data['address']; ?>>
  <br>
    <label for="email" class="label">Mother's Name:</label>
    <input type="text" id="email"   name="email" value=<?php echo $user_data['mother_name']; ?>> 

    <label for="pwd" class="label">Father's Name:</label>
    <input type="text" id="pwd"  name="pswd" value=<?php echo $user_data['father_name']; ?>>
  <br>
    <label for="email" class="label">Birth Height:</label>
    <input type="text" id="email"   name="email" value=<?php echo $user_data['birth_height']; ?>>

    <label for="pwd" class="label"> Birth Weight:</label>
    <input type="text" id="pwd"  name="pswd" value=<?php echo $user_data['birth_weight']; ?>>
  <br>
    <label for="email" class="label">Sex:</label>
    <input type="radio" id="email" name="email">Female
    <input type="radio" id="email" name="email">Male
<br>
<br>
        <div class="clearfix">
            <button type="submit" class="signupbtn">Update</button>
        </div>
    </div>
  </div>
</form>
</body>
</html>
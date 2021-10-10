<?php 
//update.php
session_start();

include("php/connection.php");
include("php/functions.php");

$user_data = check_login($con);

$id = $user_data['id'];
$user_id = $user_data['user_id'];
$user_name = $user_data['user_name'];
$password = $user_data['password'];

if(isset($_POST['submit'])){

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $middle_name = $_POST['middle_name'];
  $address = $_POST['address'];
  $mother_name = $_POST['mother_name'];
  $father_name = $_POST['father_name'];
  $birth_height = $_POST['birth_height'];
  $birth_weight = $_POST['birth_weight'];
  $place_of_birth = $_POST['place_of_birth'];
  $gender = $_POST['gender'];
  $date_of_birth = $_POST['date_of_birth'];

  // $query = "insert into users (user_id,user_name,password,first_name,last_name,last_name,middle_name,mother_name,father_name,birth_height,birth_weight,address,place_of_birth,gender) values ('$user_id','$user_name','$password','$first_name','$last_name','$middle_name','$mother_name','$father_name','$birth_height','$birth_weight','$address','$place_of_birth',$gender)";

	$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', middle_name='$middle_name', mother_name='$mother_name',father_name='$father_name', birth_height='$birth_height', birth_weight='$birth_weight', address='$address', place_of_birth='$place_of_birth', gender='$gender', date_of_birth='$date_of_birth' where id=$id";
	$result = mysqli_query($con, $sql);

	if($result){
		echo "alert('data updated')";
	}else {
		die(mysqli_error($con));
	}
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
      <input type="text" id="email"   name="first_name" value=<?php echo $user_data['first_name'];   ?>>
      <input type="text" id="email"   name="middle_name" value=<?php echo $user_data['middle_name']; ?>>
      <input type="text" id="email"   name="last_name" value=<?php echo $user_data['last_name']; ?>>
  <br>
    <label for="email" class="label">Date of Birth:</label>
    <input type="text" id="email"   name="date_of_birth" value=<?php echo $user_data['date_of_birth']; ?>>

    <label for="pwd" class="label">Place of Birth:</label>
    <input type="text" id="pwd"  name="place_of_birth" value=<?php echo $user_data['place_of_birth']; ?>>
  <br>
    <label for="email" class="label">Address:</label>
    <input type="text" id="email"   name="address" value=<?php echo $user_data['address']; ?>>
  <br>
    <label for="email" class="label">Mother's Name:</label>
    <input type="text" id="email"   name="mother_name" value=<?php echo $user_data['mother_name']; ?>> 

    <label for="pwd" class="label">Father's Name:</label>
    <input type="text" id="pwd"  name="father_name" value=<?php echo $user_data['father_name']; ?>>
  <br>
    <label for="email" class="label">Birth Height:</label>
    <input type="text" id="email"   name="birth_height" value=<?php echo $user_data['birth_height']; ?>>

    <label for="pwd" class="label"> Birth Weight:</label>
    <input type="text" id="pwd"  name="birth_weight" value=<?php echo $user_data['birth_weight']; ?>>
  <br>
    <label for="email" class="label">Sex:</label>
    <select name="gender" id="gender">
    <option value="male">male</option>
    <option value="female">female</option>
    </select>
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
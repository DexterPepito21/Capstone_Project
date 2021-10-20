<?php 
//update.php
session_start();

include("php/connection.php");
include("php/functions.php");

$user_data = check_login($con);
$child_data = child($con);

$parent_id = $user_data['parent_id'];


if(isset($_POST['submit'])){
  $child_id = $child_data['child_id'];
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

  $sql = "INSERT INTO child_tbl (child_id,parent_id,firstname,lastname,middlename,dateofbirth,placeofbirth,address,fathername,mothername,birthheight,birthweight,sex)
  values ('$child_id','$parent_id','$firstname','$lastname','$middlename','$dateofbirth','$placeofbirth','$address','$fathername','$mothername','$birthheight','$birthweight','$sex') 
  ON DUPLICATE KEY UPDATE firstname='$firstname', lastname='$lastname', middlename='$middlename', dateofbirth='$dateofbirth', placeofbirth='$placeofbirth', address='$address',fathername='$fathername', mothername='$mothername', birthheight='$birthheight', birthweight='$birthweight', sex='$sex'";

  $result = mysqli_query($con, $sql);

	if($result){
    $_SESSION['child_id'] = $child_data['child_id'];
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
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/parent_child.css">
</head>
<body>parent id, <?php echo $user_data['parent_id']; ?>
Hello, <?php echo $child_data['child_id']; ?>

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

   <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
    Add new User
  </button>
  <div class="container">
    <!-- Add user Modal -->
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form class="form-inline" action="php/addchild.php" method="post"  style="border:1px solid #ccc">
              <div class="container">
                <div class="mb-3">
                  <label for="email" class="label">Child's Name:</label>
                </div>  
                <div class="bm-3"> 
                  <label for="email" class="form-label">First Name:</label>
                  <input type="text" id="email"  class="form-control"  name="firstname" value=<?php if(isset($child_data['firstname'])) echo $child_data['firstname']; ?>>
                </div>  
                  <label for="email" class="label">Middle Name:</label>
                  <input type="text" id="email"   name="middlename" value=<?php if(isset($child_data['middlename'])) echo $child_data['middlename']; ?>>
                  <br>
                  <label for="email" class="label">Last Name:</label>
                  <input type="text" id="email"   name="lastname" value=<?php if(isset($child_data['lastname'])) echo $child_data['lastname']; ?>>
                  <br>
                  <label for="email" class="label">Date of Birth:</label>
                  <input type="text" id="email"   name="dateofbirth" value=<?php if(isset($child_data['dateofbirth'])) echo $child_data['dateofbirth']; ?>><br>

                  <label for="pwd" class="label">Place of Birth:</label>
                  <input type="text" id="pwd"  name="placeofbirth" value=<?php if(isset($child_data['placeofbirth'])) echo $child_data['placeofbirth']; ?>>
                  <br>
                  <label for="email" class="label">Address:</label>
                  <input type="text" id="email"   name="address" value=<?php if(isset($child_data['address'])) echo $child_data['address']; ?>>
                  <br>
                  <label for="email" class="label">Mother's Name:</label>
                  <input type="text" id="email"   name="mothername" value=<?php if(isset($child_data['mothername'])) echo $child_data['mothername']; ?>> <br>
                  <label for="pwd" class="label">Father's Name:</label>
                  <input type="text" id="pwd"  name="fathername" value=<?php if(isset($child_data['fathername'])) echo $child_data['fathername']; ?>>
                 <br>
                  <label for="email" class="label">Birth Height:</label>
                  <input type="text" id="email"   name="birthheight" value=<?php if(isset($child_data['birthheight'])) echo $child_data['birthheight']; ?>><br>

                  <label for="pwd" class="label"> Birth Weight:</label>
                  <input type="text" id="pwd"  name="birthweight" value=<?php if(isset($child_data['birthweight'])) echo $child_data['birthweight']; ?>>
                  <br>
                  <label for="email" class="label">Sex:</label>
                  <select name="sex" id="sex">
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
          </div>
          
        </div>
      </div>
    </div>
    
    
<!-- Forms -->
<h2><i class="fa fa-child"></i>Profile</h2>
<!--Step 1:Adding HTML-->
<form class="form-inline" action="#" method="post"  style="border:1px solid #ccc">
  <div class="container">
      <label for="email" class="label">Child's Name:</label>
      <br>
      <label for="email" class="label">First Name:</label>
      <?php if(isset($child_data['firstname'])) echo $child_data['firstname']; ?>
      <br>
      <label for="email" class="label">Middle Name:</label>
      <?php if(isset($child_data['middlename'])) echo $child_data['middlename']; ?>
      <br>
      <label for="email" class="label">Last Name:</label>
      <?php if(isset($child_data['lastname'])) echo $child_data['lastname']; ?>
      <br>
      <label for="email" class="label">Date of Birth:</label>
      <?php if(isset($child_data['dateofbirth'])) echo $child_data['dateofbirth']; ?>
      <br>
      <label for="pwd" class="label">Place of Birth:</label>
      <?php if(isset($child_data['placeofbirth'])) echo $child_data['placeofbirth']; ?>
      <br>
      <label for="email" class="label">Address:</label>
      <?php if(isset($child_data['address'])) echo $child_data['address']; ?>
      <br>
      <label for="email" class="label">Mother's Name:</label>
      <?php if(isset($child_data['mothername'])) echo $child_data['mothername']; ?>
      <br>
      <label for="pwd" class="label">Father's Name:</label>
      <?php if(isset($child_data['fathername'])) echo $child_data['fathername']; ?>
      <br>
      <label for="email" class="label">Birth Height:</label>
      <?php if(isset($child_data['birthheight'])) echo $child_data['birthheight']; ?>
      <br>
      <label for="pwd" class="label"> Birth Weight:</label>
      <?php if(isset($child_data['birthweight'])) echo $child_data['birthweight']; ?>
      <br>
      <label  class="label">Sex:</label>
      <?php if(isset($child_data['sex'])) echo $child_data['sex']; ?>
      <br>
      <br>
    </div>
  </div>
</form>

<!-- Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
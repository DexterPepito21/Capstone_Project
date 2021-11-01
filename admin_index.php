<?php 
session_start();

include("php/connection.php");
include("php/functions.php");

$user_data = check_login($con);

$sql = "SELECT vaccinated FROM chart where vaccinated='yes'";
$result=mysqli_query($con,$sql);
$complete=mysqli_num_rows($result);
$sql2 = "SELECT vaccinated FROM chart where vaccinated='no'";
$result2=mysqli_query($con,$sql2);
$Incomplete=mysqli_num_rows($result2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link rel="stylesheet" href="admin_index.css">
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
            <li><a href="admin_index.php" class="active"><i class="fas fa-home" id="icon"></i>Dashboard</a></li>
            <li><a href="admin_child.php"><i class="fas fa-child"  id="icon"></i>Child Profile</a></li>
            <li><a href="admin_chart.php"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
            <li><a href="admin_guide.php"><i class="fas fa-book"  id="icon"></i>Nutrition Guide</a></li>
            <li><a href="admin_sms.php"><i class="fas fa-comment"  id="icon"></i>SMS Notification</a></li>
          
            <div class="dropdown">
              <button class="dropbtn"><i class="fa fa-caret-down"></i></button>
              <div class="dropdown-content">
              <a href="php/logout.php"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
              </div>
            </div>
          </ul>
        </nav>

         <!-- Table -->
          <table class="row">
           <tr>
             <td>Completed</td>
             <td><?php echo $complete; ?></td>
           </tr>
           <tr>
             <td>Incomplete</td>
             <td><?php echo $Incomplete; ?></td>
           </tr>
          </table>

      <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:50%">
      <thead>       
          <tr>
              <th>Types of Vaccine</th>
              <th>No. of Children</th>
              <th>No. of Vaccinated</th>
          </tr>
      </thead>
      <tbody>
<?php 
$sql = "SELECT * FROM vaccine";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
  $vaccine_id = $row['vaccine_id'];
  $vaccinename = $row['vaccinename'];
  $sql1 = "SELECT * FROM chart where vaccine_id='$vaccine_id'";
  $result1=mysqli_query($con,$sql1);
  $rowcount=mysqli_num_rows($result1);
  $sql2 = "SELECT vaccinated FROM chart where vaccinated='yes' AND vaccine_id='$vaccine_id'";
  $result2=mysqli_query($con,$sql2);
  $rowcount2=mysqli_num_rows($result2);

?>        

            <tr>
              <td  ><?php echo $vaccinename ?></td>  
              <td  ><?php echo $rowcount ?></td>
              <td  ><?php echo $rowcount2 ?></td>            
          </tr>
     
<?php } ?>
</tbody>
  </table>

 </body>
</html>
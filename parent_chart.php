<?php 
session_start();

include("php/connection.php");
include("php/functions.php");

$child_data = chart($con);

$parent_id = $_SESSION['parent_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Chart | Parent</title>
    <link rel= "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link rel="stylesheet" href="./css/parent_chart.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
</head>


<body>Hello, 
<!-- Navigation Bar -->
<nav>
  <input type="checkbox" id="check">
  <label for="check" class="checkbtn">
    <i class="fas fa-bars"></i>
  </label>
  <label class="logo">Child Care System</label>
  <ul>
    <li><a href="parent_index.php"><i class="fas fa-home" id="icon"></i>Dashboard</a></li>
    <li><a href="parent_child.php"><i class="fas fa-child"  id="icon"></i>Child Profile</a></li>
    <li><a href="parent_chart.php" class="active"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
    <li><a href="parent_guide.php"><i class="fas fa-book"  id="icon"></i>Nutrition Guide</a></li>
          
    <div class="dropdown">
      <button class="dropbtn"><i class="fa fa-caret-down"></i></button>
      <div class="dropdown-content">
      <a href="./php/logout.php"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
      </div>
    </div>
  </ul>
</nav>
  <?php 
    $sql = "SELECT * FROM child_tbl where parent_id='$parent_id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
  ?>        
  <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
      <thead>
          <tr>
              <th>vaccine</th>
              <th>dateofvaccination</th>
              <th>vaccinatorname</th>
              <th>healthcenter</th>
          </tr>
      </thead>
      <tbody>
          <?php 
          $id = $row['child_id'];
          $sql = "SELECT vaccine.vaccinename, healthcare_info.vaccinatorname, chart.dateofvaccination, healthcenter_tbl.healthcenter 
          FROM (((chart
          INNER JOIN vaccine ON chart.vaccine_id = vaccine.vaccine_id)
          INNER JOIN healthcare_info ON chart.healthcare_id = healthcare_info.healthcare_id)
          INNER JOIN  healthcenter_tbl ON chart.healthcenter_id = healthcenter_tbl.healthcenter_id)
          where child_id='$id'";
          $stmt = $con->prepare($sql);
          $stmt->execute();
          $result = $stmt->get_result();
          while($row = $result->fetch_assoc()){
          ?>
          <tr>
              <td><?php echo $row['vaccinename']; ?></td>
              <td><?php echo $row['dateofvaccination']; ?></td>
              <td><?php echo $row['vaccinatorname']; ?></td>
              <td><?php echo $row['healthcenter']; ?></td>        
              </td>
          </tr>
          <?php } ?>
      </tbody>
  </table>
</div>
<?php } ?>


<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>
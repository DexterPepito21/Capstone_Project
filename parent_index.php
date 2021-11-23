<?php 
session_start();
error_reporting(0);
include("php/connection.php");
include("php/functions.php");

$user_data = check_login($con);
$parent_id=$_SESSION['parent_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/parent_index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard | Parent</title>
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
          <li><a href="parent_index.php" class="active"><i class="fas fa-home" id="icon"></i>Dashboard</a></li>
          <li><a href="parent_child.php"><i class="fas fa-child"  id="icon"></i>Child Profile</a></li>
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
      

      <br>
      <br>
       <!-- Next Due vaccines -->
      <center>
      <table class="table" style="width: 50%">
      <tbody>
      <thead>
                <th >Next Due Vaccination</th>
      </thead>
        
              <?php 
                $sql = "SELECT * FROM child_tbl where parent_id='$parent_id'";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                $child_ids = array();
                while($row = $result->fetch_assoc()){
                $child_ids[] = $row['child_id'];
                }
                foreach ($child_ids as $value) {
                $sql = "SELECT * FROM chart where child_id='$value'";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                while($row=mysqli_fetch_assoc($result)){
                  $child_id = $row['child_id'];
              ?>
                <tr>
                  <?php 
                    $sql = "SELECT * FROM chart where child_id='$child_id'";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while($row=mysqli_fetch_assoc($result)){
                      if($row['vaccinated'] == 'no'){
                        $chart_id = $row['chart_id'];
                        $sql1 = "SELECT *, child_tbl.parent_id,vaccine.vaccinename, healthcenter_tbl.healthcenter 
                        FROM (((chart
                        LEFT JOIN child_tbl ON chart.child_id = child_tbl.child_id)
                        LEFT JOIN vaccine ON chart.vaccine_id = vaccine.vaccine_id)
                        LEFT JOIN  healthcenter_tbl ON chart.healthcenter_id = healthcenter_tbl.healthcenter_id)
                        where chart.chart_id='$chart_id'";
                        $result1 = mysqli_query($con,$sql1); 
                        $rows1=mysqli_fetch_assoc($result1);
                        $number_rows_chart=mysqli_num_rows($result1);
                        $vaccinename = $rows1['vaccinename']; //vaccine name
                        $dose = $rows1['dose'];
                  ?>
                 <td>
                      <?php 
                          $sql1 = "SELECT * FROM child_tbl where child_id='$value'";
                          $stmt1 = $con->prepare($sql1);
                          $stmt1->execute();
                          $result1 = $stmt1->get_result();
                          while($row1 = $result1->fetch_assoc()){
                            echo $row1['firstname'];
                          }
                      ?>
                  </td>
                  <td><?php echo $vaccinename?></td>
                  <td><?php echo $dose?></td>
                  <td><?php echo $row['dateofvaccination']?></td>
                </tr>
              <?php }}}}?>
       </tbody>
      </table>


      <br>
      <br>
      <br>
      <br>

      <center><table class="table" style="width: 60%; margin-bottom: 30px">
      <thead style="line-height: 40px">
                <th style="width: 10%">Vaccine</th>
                <th style="width: 30%">Information</th>
      </thead>
      <tbody>
           <tbody>
           <tr>
                <?php 
                    $sql = "SELECT *
                    FROM vaccine_information";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while($row = $result->fetch_assoc()){
                        $vaccinename = $row['vaccinename'];
                        $information = $row['information'];
                    ?>        
                        <tr>
                        <td  ><?php echo $vaccinename ?></td>  
                        <td  ><?php echo $information ?></td>          
                    </tr>
                    <?php } ?>
          </tbody>
        </table>
        </div>
        </div>
        </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
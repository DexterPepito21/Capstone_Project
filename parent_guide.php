<?php 
include("php/connection.php");
include("php/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition Guide | Admin</title>
    <link rel= "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link rel="stylesheet" href="admin_guide.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
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
            <a href="logout.php"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
            </div>
          </div>
        </ul>
      </nav>

       <!-- Table -->
       <center><header class="head"><i class="fa fa-book"></i>Nutrition Guide</header></center>
      <center><table class="table" style="width: 50%">
      <thead>
        <th>Healthy Foods</th>
        <th>Benefits</th>
      </thead>
      <tbody>
           <tbody>
           <?php 
              $sql = "SELECT * FROM guide";
              $stmt = $con->prepare($sql);
              $stmt->execute();
              $result = $stmt->get_result();
              while($row = $result->fetch_assoc()){
                $hf = $row['hf'];
                $benefits = $row['benefits'];
              ?>        
                <tr>
                  <td data-label="Healthy Food" style="text-align: center;" ><?php echo $hf ?></td>  
                  <td data-label="Benefits"><?php echo $benefits ?></td>       
              </tr>
              <?php } ?>
          </tbody>
        </table>
        </div>
        </div>
        </div>
        <!-- Table -->
      
      

    <div class="container">
       <h1 style="text-align: center;">Reminders!</h1>
       <div class="content">
       <ul class="rem" style="text-align: justify;">
       <?php 
              $sql = "SELECT * FROM guide";
              $stmt = $con->prepare($sql);
              $stmt->execute();
              $result = $stmt->get_result();
              while($row = $result->fetch_assoc()){
                $reminders = $row['reminders'];
              ?>        
                <li><?php echo $reminders ?></li>
              <?php } ?>
        </ul>
        </div>
    </div>

   
<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>
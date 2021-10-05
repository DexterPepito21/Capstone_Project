<?php 

	include("./php/connection.php");
	include("./php/functions.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Profile | Admin</title>
    <link rel= "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link rel="stylesheet" href="./css/admin_child.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">    
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
          <li><a href="admin_child.php" class="active"><i class="fas fa-child"  id="icon"></i>Child Profile</a></li>
          <li><a href="admin_chart.php"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
          <li><a href="admin_guide.php"><i class="fas fa-book"  id="icon"></i>Nutrition Guide</a></li>
          <li><a href="admin_sms.php"><i class="fas fa-comment"  id="icon"></i>SMS Notification</a></li>
        
          <div class="dropdown">
            <button class="dropbtn"><i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
            <a href="#"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
            </div>
          </div>
        </ul>
      </nav>

     <!-- Table -->
     <div class="container" style="overflow-x: auto;">
         <center><header><i class="fa fa-child"></i>Children's Profile</header></center>
         <div class="row">
             <div class="col">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Middle Initial</th>
                    <th>Sex</th>
                    <th>Date of Birth</th>
                    <th>Place of Birth</th>
                    <th>Address</th>
                    <th>Mother's Name</th>
                    <th>Father's Name</th>
                    <th>Weight</th>
                    <th>Height</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //table
                $sql = "SELECT * FROM users";
                $result = mysqli_query($con,$sql);
                if($result) {
                    while($row = mysqli_fetch_assoc($result)) {
            ?>


                        
                        <!-- // echo " 
                        // <tr> 
                        //     <td>".$first_name."</td>
                        // </tr>";

                        // <button ><a href="delte.php?deleteid='.$id.'">Delete</a></button> -->
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['middle_name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['date_of_birth']; ?></td>
                    <td><?php echo $row['place_of_birth']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['mother_name']; ?></td>
                    <td><?php echo $row['father_name']; ?></td>
                    <td><?php echo $row['birth_height']; ?></td>
                    <td><?php echo $row['birth_weight']; ?></td>
                </tr>
                <?php } ?>
            <?php } ?>            
                
     </tbody>
     </table>
</div>
</div>
</div>
<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

<script text="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
             
        } );
    } );
</script>
</body>
</html>
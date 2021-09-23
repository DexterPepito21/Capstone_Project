<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Profile | Admin</title>
    <link rel= "stylesheet" href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link rel="stylesheet" href="admin_child.css">
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
                <tr>
                    <td>1</td>
                    <td>Pepito</td>
                    <td>Dexter</td>
                    <td>L.</td>
                    <td>Male</td>
                    <td>2011/04/25</td>
                    <td>Tarlac City</td>
                    <td>Tarlac City</td>
                    <td></td>
                    <td></td>
                    <td>54</td>
                    <td>165cm</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Orduña</td>
                    <td>Nicole Churchil</td>
                    <td>S.</td>
                    <td>Female</td>
                    <td>2011/04/25</td>
                    <td>Pangasinan</td>
                    <td>Pangasinan</td>
                    <td></td>
                    <td></td>
                    <td>60</td>
                    <td>140cm</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Basilio</td>
                    <td>Camelle Ann</td>
                    <td>P.</td>
                    <td>Female</td>
                    <td>2011/04/25</td>
                    <td>Pura</td>
                    <td>Pura</td>
                    <td></td>
                    <td></td>
                    <td>45</td>
                    <td>159cm</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Perdido</td>
                    <td>Patricia Anne</td>
                    <td>P.</td>
                    <td>Female</td>
                    <td>2011/04/25</td>
                    <td>Anao</td>
                    <td>Anao</td>
                    <td></td>
                    <td></td>
                    <td>50</td>
                    <td>150cm</td>
                </tr>
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
<?php 
include("php/connection.php");
$query1 = "SELECT * FROM healthcenter_tbl";
$result1 = mysqli_query($con,$query1);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Chart</title>
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   
=======
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin_chart.css">
>>>>>>> upstream/main
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
<<<<<<< HEAD
    <li><a href="admin_child.php" class="active"><i class="fas fa-child"  id="icon"></i>Child Profile</a></li>
    <li><a href="admin_chart.php"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
=======
    <li><a href="admin_child.php"><i class="fas fa-child"  id="icon"></i>Child Profile</a></li>
    <li><a href="admin_chart.php" class="active"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
>>>>>>> upstream/main
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

      

            <!-- child table -->
    <div class="container">
<<<<<<< HEAD
    <table id="example" class="table table-dark" style="width:100%">
        <thead>
            <tr>
              <th>firstname</th>
              <th>lastname</th>
              <th>middlename</th>
              <th>dateofbirth</th>
              <th>address</th>
              <th>Update</th>
              <th>Delete</th>
=======
    <table id="example" class="table table-primary table-hover" style="width:50%;">
        <thead>
            <tr>
              <th>Child's Name</th>
              <th style="width: 10%">Details</th>
              <th style="width: 10%">Delete</th>
>>>>>>> upstream/main
            </tr>
        </thead>
        <tbody class="table table-light" style="line-height: 20px">
            <?php 
            $sql = "SELECT * FROM child_tbl";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td hidden><?php echo $row['parent_id']; ?></td>
                <td hidden><?php echo $row['child_id']; ?></td>
<<<<<<< HEAD
                <td><?php echo $row['firstname']; ?></td>               
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['middlename']; ?></td>    
                <td><?php echo $row['dateofbirth']; ?></td>   
                <td><?php echo $row['address']; ?></td>            
                <td><button id="id-<?php echo $row['child_id']; ?>" type="button" class="btn btn-primary view_chart">
                details
=======
                <td><?php echo $row['firstname']."  ".$row['lastname']; ?></td>                           
                <td><button id="id-<?php echo $row['child_id']; ?>" type="button" class="btn btn-primary view_chart" style="color: black; border: none">
                <i class="fa fa-arrow-circle-right"></i>
>>>>>>> upstream/main
                </button></td>
                <td>
                <form action="php/delete.php" method="POST">
                    <input type="hidden" name="child_id" value="<?php echo $row['child_id']; ?>">
<<<<<<< HEAD
                    <button type="submit" name="delete_btn" class="btn btn-danger"><a href="php/delete.php"></a>Delete</button>
=======
                    <button type="submit" name="deletebtn" class="btn btn-danger"><a href="php/delete.php"></a><i class="fa fa-trash"></i></button>
>>>>>>> upstream/main
                </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<<<<<<< HEAD

<!-- chart table -->
<div class="container">
  <table id="example" class="table table-dark" style="width:100%">
=======
<!-- chart table -->
<div class="container">
  <table id="example" class="table table-primary table-hover" style="width:100%">
>>>>>>> upstream/main
      <thead>
          <tr>
            <th>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduserchart">
<<<<<<< HEAD
              Add Usser Chart
=======
              Add User Chart
>>>>>>> upstream/main
              </button>
            </th>
          </tr>
          <tr>
<<<<<<< HEAD
              <th>vaccinename</th>
              <th>vaccinatorname</th>
              <th>dateofvaccination</th>
              <th>healthcenter</th>
              <th>vaccinated</th>
=======
              <th>Child's Name</th>
              <th>Vaccine Name & Dosage</th>
              <th>Vaccinator Name</th>
              <th>Date of Vaccination</th>
              <th>Health Center</th>
              <th>Vaccinated?</th>
>>>>>>> upstream/main
              <th>Update</th>
              <th>Delete</th>
          </tr>
      </thead>
<<<<<<< HEAD
      <tbody>
          <?php 
         $sql = "SELECT *, vaccine.vaccinename, healthcare_info.vaccinatorname, chart.dateofvaccination, healthcenter_tbl.healthcenter 
         FROM (((chart
=======
      <tbody class="table table-light">
          <?php 
         $sql = "SELECT *, child_tbl.firstname, child_tbl.lastname, vaccine.vaccinename, healthcare_info.vaccinatorname, chart.dateofvaccination, healthcenter_tbl.healthcenter 
         FROM ((((chart
         LEFT JOIN child_tbl ON chart.child_id = child_tbl.child_id)
>>>>>>> upstream/main
         LEFT JOIN vaccine ON chart.vaccine_id = vaccine.vaccine_id)
         LEFT JOIN healthcare_info ON chart.healthcare_id = healthcare_info.healthcare_id)
         LEFT JOIN  healthcenter_tbl ON chart.healthcenter_id = healthcenter_tbl.healthcenter_id)
         ";
          $stmt = $con->prepare($sql);
          $stmt->execute();
          $result = $stmt->get_result();
          while($row = $result->fetch_assoc()){
          ?>
          <tr>
              <td hidden><?php echo $row['chart_id']; ?></td>  
              <td hidden><?php echo $row['child_id']; ?></td>
<<<<<<< HEAD
=======
              <td><?php echo $row['firstname'].'  '.$row['lastname']; ?></td>
>>>>>>> upstream/main
              <td><?php echo $row['vaccinename']; ?></td>
              <td><?php echo $row['vaccinatorname']; ?></td>
              <td><?php echo $row['dateofvaccination']; ?></td>
              <td><?php echo $row['healthcenter']; ?></td>        
              <td><?php echo $row['vaccinated']; ?></td>  
              <td hidden><?php echo $row['vaccine_id']; ?></td>       
<<<<<<< HEAD
              <td><button id="id-<?php echo $row['chart_id']; ?>" type="button" class="btn btn-primary editbtn">
              edit
              </button></td>
              <td>
              <form action="php/delete.php" method="POST">
                  <input type="hidden" name="child_id" value="<?php echo $row['child_id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"><a href="php/delete.php"></a>Delete</button>
=======
              <td><button id="id-<?php echo $row['chart_id']; ?>" type="button" class="btn btn-primary editbtn" style="color: black; border: none;">
              <i class="fa fa-pencil-square-o"></i>
              </button></td>
              <td>
              <form action="php/delete.php" method="POST">
                  <input type="hidden" name="chart_id" value="<?php echo $row['chart_id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"><a href="php/delete.php"></a><i class="fa fa-trash"></i></button>
>>>>>>> upstream/main
              </form>
              </td>
          </tr>
          <?php } ?>
      </tbody>
  </table>
</div>

<!-- user details chart modal -->
<div class="modal fade" id="detailschart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
<<<<<<< HEAD
=======
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CHILD IMMUNIZATION RECORD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="chart_detail">
      
       
      
      </div>         
    </div>
  </div>
</div>

<!-- add user chart modal -->
<div class="modal fade" id="adduserchart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="php/newvaccine_chart.php" method="POST">    
      <select name="child_id" class="form-control">
                <?php  
                $query = "SELECT * FROM child_tbl";
                $result = mysqli_query($con,$query);  
                while($rows=mysqli_fetch_assoc($result)){
                  $child_id = $rows['child_id'];
                  $firstname = $rows['firstname'];
                  $lastname - $row['lastname'];
                  $middlename = $row['middlename'];
                  echo "<option value='$child_id'>$firstname</option>";
                }                                     
                ?>
            </select>
            <br>                   
            Vaccine Name & Dosage
            <select name="vaccine_id" class="form-control">
                <?php  
                $query = "SELECT * FROM vaccine";
                $result = mysqli_query($con,$query);  
                while($rows=mysqli_fetch_assoc($result)){
                  $vaccine_id = $rows['vaccine_id'];
                  $vaccinename = $rows['vaccinename'];
                  echo "<option value='$vaccine_id'>$vaccinename</option>";
                }                                     
                ?>
            </select> 
            <br>
            Vaccinator's Name 
            <select name="vaccinatorname" class="form-control">
                <?php 
                $query = "SELECT * FROM healthcare_info";
                $result = mysqli_query($con,$query);
                while( $rows=mysqli_fetch_assoc($result)){
                  $healthcare_id = $rows['healthcare_id'];
                  $vaccinatorname = $rows['vaccinatorname'];
                  echo "<option value='$healthcare_id'>$vaccinatorname</option>";
                } 
              ?>
            </select>    
            <br>
            Date of Vaccination    
            <input class="form-control" type="datetime-local" id="dtlocal" name="dateofvaccination">  
            <br>
            healthcenter
            <select name="healthcenter" class="form-control">
                <?php  
                $query = "SELECT * FROM healthcenter_tbl";
                $result = mysqli_query($con,$query);  
                while($rows=mysqli_fetch_assoc($result)){
                  $healthcenter_id = $rows['healthcenter_id'];
                  $healthcenter = $rows['healthcenter'];
                  echo "<option value='$healthcenter_id'>$healthcenter</option>";
                }                                     
                ?>
            </select>     
            <br>
            vaccinate
            <select name="vaccinated" class="form-control">
                <option value="no">not vaccinated</option>
                <option value="yes">vaccinated</option>
            </select>
            </br>  
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>  
        </form>

      </div>         
    </div>
  </div>
</div>

<!-- edit user chart -->
<div class="modal fade" id="editchart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
>>>>>>> upstream/main
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETAILS CHART</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<<<<<<< HEAD
      <div class="modal-body" id="chart_detail">
      
       
      
      </div>         
    </div>
  </div>
</div>

<!-- add user chart modal -->
<div class="modal fade" id="adduserchart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="php/newvaccine_chart.php" method="POST">          
            Child Name
            <select name="child_id">
                <?php  
                $query = "SELECT * FROM child_tbl";
                $result = mysqli_query($con,$query);  
                while($rows=mysqli_fetch_assoc($result)){
                  $child_id = $rows['child_id'];
                  $firstname = $rows['firstname'];
                  $lastname = $rows['lastname'];
                  $middlename = $rows['middlename'];
                  echo "<option value='$child_id'>$firstname $middlename $lastname</option>";
                }                                     
                ?>
            </select>         
            Vaccine Name
            <select name="vaccine_id">
                <?php  
                $query = "SELECT * FROM vaccine";
                $result = mysqli_query($con,$query);  
                while($rows=mysqli_fetch_assoc($result)){
                  $vaccine_id = $rows['vaccine_id'];
                  $vaccinename = $rows['vaccinename'];
                  echo "<option value='$vaccine_id'>$vaccinename</option>";
                }                                     
                ?>
            </select> 
            <br>
            Vaccinator's Name 
            <select name="vaccinatorname">
                <?php 
                $query = "SELECT * FROM healthcare_info";
                $result = mysqli_query($con,$query);
                while( $rows=mysqli_fetch_assoc($result)){
                  $healthcare_id = $rows['healthcare_id'];
                  $vaccinatorname = $rows['vaccinatorname'];
                  echo "<option value='$healthcare_id'>$vaccinatorname</option>";
                } 
              ?>
            </select>    
            <br>
            Date of Vaccination    
            <input type="datetime-local" id="dtlocal" name="dateofvaccination">  
            <br>
            healthcenter
            <select name="healthcenter">
                <?php  
                $query = "SELECT * FROM healthcenter_tbl";
                $result = mysqli_query($con,$query);  
                while($rows=mysqli_fetch_assoc($result)){
                  $healthcenter_id = $rows['healthcenter_id'];
                  $healthcenter = $rows['healthcenter'];
                  echo "<option value='$healthcenter_id'>$healthcenter</option>";
                }                                     
                ?>
            </select>     
            <br>
            vaccinate
            <select name="vaccinated">
                <option value="no">not vaccinated</option>
                <option value="yes">vaccinated</option>
            </select>
            </br>  
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>  
        </form>

      </div>         
=======
      <div class="modal-body" id="edit_child">
                  
       

      </div>   
>>>>>>> upstream/main
    </div>
  </div>
</div>

<<<<<<< HEAD
<!-- edit user chart -->
<div class="modal fade" id="editchart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Vaccine Chart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="edit_child">
                  
       

      </div>   
    </div>
  </div>
</div>

=======
>>>>>>> upstream/main


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){
  // $("#add-chart").click(function(){

  //   // alert("add here");
  // });
  $('.view_chart').on('click', function(){
      var child_id = $(this).attr("id").replace('id-','');
      // alert(child_id);
 
        $.ajax({
          url: "php/child.php",
          type: "post",
          data:{child_id: child_id},
          success:function(data){
            $('#chart_detail').html(data);
            $('#detailschart').modal('show');
          }
        }); 

      });
      
  $('.editbtn').on('click', function(){
      var chart_id = $(this).attr("id").replace('id-','');
      // alert(chart_id);
  
      $.ajax({
          url: "php/edit_child.php",
          type: "post",
          data:{chart_id: chart_id},
          success:function(data){
            $('#edit_child').html(data);
            $('#editchart').modal('show');
          }
        }); 
     
  });

  $tr = $(this).closest('tr');
        // var data = $tr.children('td').map(function(){
        //   return $(this).text();
        // }).get();

        // console.log(data);
        // $('#chart_id').val(data[0]);
        // $('#child_id').val(data[1]);
        // $('#vaccinename').val(data[2]);
        // $('#vaccinatorname').val(data[3]);
        // $('#dateofvaccination').val(data[4]);
        // $('#healthcenter').val(data[5]);
        // $('#vaccinated').val(data[6]); 
        // $('#vaccine_id').val(data[7]);     

});

</script>



</body>
</html>
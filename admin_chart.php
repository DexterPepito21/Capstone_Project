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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   
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
      <a href="php/logout.php"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
      </div>
    </div>
  </ul>
</nav>

      

            <!-- child table -->
    <div class="container">
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
            </tr>
        </thead>
        <tbody>
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
                <td><?php echo $row['firstname']; ?></td>               
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['middlename']; ?></td>    
                <td><?php echo $row['dateofbirth']; ?></td>   
                <td><?php echo $row['address']; ?></td>            
                <td><button id="id-<?php echo $row['child_id']; ?>" type="button" class="btn btn-primary view_chart">
                details
                </button></td>
                <td>
                <form action="php/delete.php" method="POST">
                    <input type="hidden" name="child_id" value="<?php echo $row['child_id']; ?>">
                    <button type="submit" name="delete_btn" class="btn btn-danger"><a href="php/delete.php"></a>Delete</button>
                </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>



<!-- chart table -->
<div class="container">
  <table id="example" class="table table-dark" style="width:100%">
      <thead>
          <tr>
            <th>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduserchart">
              Add Usser Chart
              </button>
            </th>
          </tr>
          <tr>
              <th>vaccinename</th>
              <th>vaccinatorname</th>
              <th>dateofvaccination</th>
              <th>healthcenter</th>
              <th>vaccinated</th>
              <th>Update</th>
              <th>Delete</th>
          </tr>
      </thead>
      <tbody>
          <?php 
         $sql = "SELECT *, vaccine.vaccinename, healthcare_info.vaccinatorname, chart.dateofvaccination, healthcenter_tbl.healthcenter 
         FROM (((chart
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
              <td><?php echo $row['vaccinename']; ?></td>
              <td><?php echo $row['vaccinatorname']; ?></td>
              <td><?php echo $row['dateofvaccination']; ?></td>
              <td><?php echo $row['healthcenter']; ?></td>        
              <td><?php echo $row['vaccinated']; ?></td>  
              <td hidden><?php echo $row['vaccine_id']; ?></td>       
              <td><button id="id-<?php echo $row['chart_id']; ?>" type="button" class="btn btn-primary editbtn">
              edit
              </button></td>
              <td>
              <form action="php/delete.php" method="POST">
                  <input type="hidden" name="child_id" value="<?php echo $row['child_id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"><a href="php/delete.php"></a>Delete</button>
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
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETAILS CHART</h5>
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
        <input type="text" placeholder="child_id Name" name="child_id" id="child_id"/>                  
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
    </div>
  </div>
</div>

<!-- edit user chart -->
<div class="modal fade" id="editchart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Vaccine Chart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="edit_child">
                  
       

      </div>   
    </div>
  </div>
</div>



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
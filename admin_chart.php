<?php 
include("php/connection.php");
$query1 = "SELECT * FROM healthcenter_tbl";
$result1 = mysqli_query($con,$query1);

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

      <!-- edit modal -->
    <div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form action="php/updateuser.php" class="sign-up-form" method="post">
       
            <h2 class="title">Sign up</h2>
            <!-- INSERT CODE HERE FOR ERROR -->
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="user_id" id="user_id">
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="First Name" name="firstname"  id="firstname"/>
            </div>
            <div> <!-- Dropdown -->
            <select name="username">
            <?php 
            $query = "SELECT username FROM parent_tbl";
            $result = mysqli_query($con,$query);
            while($rows=mysqli_fetch_assoc($result)){
              $get_data = $rows['username'];
              echo "<option value='$get_data'>$get_data</option>";
            } 
            ?>

            </select>	
                    </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Last Name" name="lastname" id="lastname"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Middle Name" name="middlename" id="middlename"/>
            </div>
            <div class="input-field">
              <i class="fas fa-map-marker"></i>
              <input type="text" placeholder="Address" name="address"/>
            </div>
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="text" placeholder="Phone Number" name="phone_num"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" id="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" id="password"/>
            </div>
            <div class="modal-footer">
            <button type="submit" name="update" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>

          </div>         
        </div>
      </div>
    </div>


    <!-- Output table -->
    <div class="container">
    <table id="example" class="table table-dark" style="width:100%">
        <thead>
            <tr>
                <th>Child ID</th>
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
                <td><?php echo $row['child_id']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['middlename']; ?></td>
                <td><?php echo $row['dateofbirth']; ?></td>
                <td><?php echo $row['address']; ?></td>               
                <td><button type="button" class="btn btn-primary editbtn">
                Update
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

<?php 
            $sql = "SELECT * FROM child_tbl";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
            ?>
<div class="modal fade" id="vaccinechart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Vaccine Chart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
    <form action="controller.php" method="POST">
      <div class="row">
        <div class="col">
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th style="width: 10%;">Vaccine Name</th>
                    <th style="width: 10%;">Doses <br> (Recommended Age)</th>
                    <th style="width: 15%;">Date of Vaccination</th>
                    <th style="width: 10%;">Vaccinator's Name</th>
                    <th style="width: 10%;">Health Center</th>
                </tr>
            </thead>
            <tbody>
                  <tr>
                    <td> BCG </td>
                    <td> 1 <br>(Birth) </td>
                    <td>
                      <form action="/action_page.php">
                      <label for="datetime"> 1st Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="bcg_1st">
                      </form>
                    </td>
                    <td>
                    <select name="bcgvaccinatorname">
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
                    </td>
                    <td>
                    <div> <!-- Dropdown -->
                      <select name="bcghealthcenter_id">
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
                    </div>
                  </tr>
                  <tr>
                    <td> HEPATITIS B </td>
                    <td> 1 <br>(Birth) </td>
                    <td>
                      <form action="/action_page.php">
                      <label for="datetime"> 1st Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="hepatitis">
                      </form>
                    <td>
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
                    </td>
                    <td>
                    <select name="bcghealthcenter_id">
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
                    </td>
                    </td>
                  </tr>
                  <tr>
                    <td> PENTAVALENT VACCINE </td>
                    <td> 3 <br> (1 ½, 2 ½, 3 ½ months) </td>
                    <td>
                      <form action="/action_page.php">
                      <label for="datetime"> 1st Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      <br>
                      <label for="datetime"> 2nd Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      <br>
                      <label for="datetime"> 3rd Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      </form>
                    </td>
                    <td>
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
                    <br><br>
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
                    <br><br>
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
                    </td>
                    <td>
                    <select name="healthcenter_id">
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
                      <br><br>
                      <select name="healthcenter_id">
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
                      <br><br>
                      <select name="healthcenter_id">
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
                    </td>
                  </tr>
                  <tr>
                    <td> ORAL POLIO VACCINE (OPV) </td>
                    <td> 3 <br> (1 ½, 2 ½, 3 ½ months) </td>
                    <td>
                      <form action="/action_page.php">
                      <label for="datetime"> 1st Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      <br>
                      <label for="datetime"> 2nd Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      <br>
                      <label for="datetime"> 3rd Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      </form>
                    </td>
                    <td>
                      <br><br>
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
                      <br><br>
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
                      <br><br>
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
                    </td>
                    <td>
                      <br><br>
                      <select name="healthcenter_id">
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
                      <br><br>
                      <select name="healthcenter_id">
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
                      <br><br>
                      <select name="healthcenter_id">
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
                    </td>
                  </tr>
                  <tr>
                    <td> INACTIVATED POLIO VACCINE </td>
                    <td> 1 <br> (3 ½ months) </td>
                    <td>
                      <form action="/action_page.php">
                      <label for="datetime"> 1st Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      </form>
                    </td><br>
                    <td>
                      <br>
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
                    </td>
                    <td>
                      <br>
                      <select name="healthcenter_id">
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
                    </td>
                  </tr>
                  <tr>
                    <td> PNEUMOCOCCAL CONJUGATE VACCINE </td>
                    <td> 3 <br> (1 ½, 2 ½, 3 ½ months) </td>
                    <td>
                      <form action="/action_page.php">
                      <label for="datetime"> 1st Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      <br>
                      <label for="datetime"> 2nd Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      <br>
                      <label for="datetime"> 3rd Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      </form>
                    </td>
                    <td>
                      <br><br>
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
                      <br><br>
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
                      <br><br>
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
                    </td>
                    <td>
                      <br><br>
                      <select name="healthcenter_id">
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
                      <br><br>
                      <select name="healthcenter_id">
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
                      <br><br>
                      <select name="healthcenter_id">
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
                    </td>
                  </tr>
                  <tr>
                    <td> MEASLES, MUMPS, RUBELLA (MMR) </td>
                    <td> 2 <br> (9 months, 1 year old) </td>
                    <td>
                      <form action="/action_page.php">
                      <label for="datetime"> 1st Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      <br>
                      <label for="datetime"> 2nd Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      </form>
                    </td>
                    <td>
                    <br><br>
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
                      <br><br>
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
                    </td>
                    <td>
                    <br><br>
                    <select name="healthcenter_id">
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
                      <br><br>
                      <select name="healthcenter_id">
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
                    </td>
                  </tr>
                  <tr>
                    <td> OTHERS </td>
                    <td> -- </td>
                    <td> -- </td>
                    <td> -- </td>
                    <td> -- </td>
                  </tr>
     </tbody>
     </table>
</div>
</div>
</div></center>
      </form>
      <div class="modal-footer">
        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
        <button type="submit" name="updateResident" class="btn btn-secondary">Save Changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
            <?php } ?>
<!-- Modal -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){
  $('.editbtn').on('click', function(){

      $('#vaccinechart').modal('show');
      
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
        $('#firstname').val(data[1]);
        $('#lastname').val(data[2]);
        $('#middlename').val(data[3]);
        $('#dateofbirth').val(data[4]);
        $('#address').val(data[5]);
        
        
  });
});
</script>

</body>
</html>
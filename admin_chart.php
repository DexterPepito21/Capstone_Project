<?php 
include("php/connection.php");
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

            <form action="php/adduser.php" class="sign-up-form" method="post">
       
            <h2 class="title">Sign up</h2>
            <!-- INSERT CODE HERE FOR ERROR -->
            
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="First Name" name="first_name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Last Name" name="last_name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Middle Name" name="middle_name"/>
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
              <input type="text" placeholder="Username" name="user_name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <div class="modal-footer">
            <button type="submit" name="insertdata" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>

          </div>
          
        </div>
      </div>
    </div>
    
  
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
              <input type="text" placeholder="First Name" name="first_name"  id="first_name"/>
            </div>
            <div> <!-- Dropdown -->
            <select name="user_name">
        <?php 
        $query = "SELECT user_name FROM users";
        $result = mysqli_query($con,$query);
        while($rows=mysqli_fetch_assoc($result)){
          $get_data = $rows['user_name'];
          echo "<option value='$get_data'>$get_data</option>";
        } 
        ?>

        </select>	
                    </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Last Name" name="last_name" id="last_name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Middle Name" name="middle_name" id="middle_name"/>
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
              <input type="text" placeholder="Username" name="user_name" id="user_name"/>
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



    <div class="container">
       <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
      Add new User
    </button>
    <table id="example" class="table table-dark" style="width:100%">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Password</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>middle_name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM users";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['middle_name']; ?></td>
                <td><button type="button" class="btn btn-primary editbtn">
                Update
                </button></td>
                <td>
                <form action="php/delete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete_btn" class="btn btn-danger"><a href="php/delete.php"></a>Delete</button>
                </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php 
            $sql = "SELECT * FROM users";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
            ?>
<div class="modal fade" id="exampleModalCenter<?php echo $row['id']; ?>Unique" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
      <!-- Table -->Hello, <?php echo $user_data['id']; ?>
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
                      <br>
                      <input type="text" id="vname" name="bcg_vaccinator_name">
                    </td>
                    <td>
                      <br>
                      <input type="text" id="place">
                    </td>
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
                        <br>
                      <input type="text" id="vname" name="hepatitis_vaccinator_name">
                    </td>
                    <td>
                      <br>
                      <input type="text" id="place">
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
                      <br><br>
                      <input type="text" id="vname">
                      <br><br>
                      <input type="text" id="vname">
                      <br><br>
                      <input type="text" id="vname">
                    </td>
                    <td>
                      <br><br>
                      <input type="text" id="place">
                      <br><br>
                      <input type="text" id="place">
                      <br><br>
                      <input type="text" id="place">
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
                      <input type="text" id="vname">
                      <br><br>
                      <input type="text" id="vname">
                      <br><br>
                      <input type="text" id="vname">
                    </td>
                    <td>
                      <br><br>
                      <input type="text" id="place">
                      <br><br>
                      <input type="text" id="place">
                      <br><br>
                      <input type="text" id="place">
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
                      <input type="text" id="vname">
                    </td>
                    <td>
                      <br>
                      <input type="text" id="place">
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
                      <input type="text" id="vname">
                      <br><br>
                      <input type="text" id="vname">
                      <br><br>
                      <input type="text" id="vname">
                    </td>
                    <td>
                      <br><br>
                      <input type="text" id="place">
                      <br><br>
                      <input type="text" id="place">
                      <br><br>
                      <input type="text" id="place">
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
                      <input type="text" id="vname">
                      <br><br>
                      <input type="text" id="vname">
                    </td>
                    <td>
                    <br><br>
                      <input type="text" id="place">
                      <br><br>
                      <input type="text" id="place">
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

      $('#edituser').modal('show');
      
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
        $('#user_id').val(data[1]);
        $('#user_name').val(data[2]);
        $('#password').val(data[3]);
        $('#first_name').val(data[4]);
        $('#last_name').val(data[5]);
        $('#middle_name').val(data[6]);
        
        
  });
});
</script>

</body>
</html>
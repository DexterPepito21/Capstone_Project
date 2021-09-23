<?php 

	include("connection.php");
	include("functions.php");

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
    <link rel="stylesheet" href="parent_chart.css">
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
        <li><a href="parent_index.php"><i class="fas fa-home" id="icon"></i>Dashboard</a></li>
        <li><a href="parent_child.php"><i class="fas fa-child"  id="icon"></i>Child Profile</a></li>
        <li><a href="parent_chart.php" class="active"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
        <li><a href="parent_guide.php"><i class="fas fa-book"  id="icon"></i>Nutrition Guide</a></li>
              
        <div class="dropdown">
          <button class="dropbtn"><i class="fa fa-caret-down"></i></button>
          <div class="dropdown-content">
          <a href="#"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
          </div>
        </div>
      </ul>
    </nav>

     <!-- Table -->
     <center><div class="container" style="overflow-x: auto;">
         <center><header><i class="fa fa-chart-bar"></i>Vaccine Chart</header></center>
         <div class="row">
             <div class="col">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:80%">
            <thead>
                <tr>
                    <th style="width: 5%;">Vaccine Name</th>
                    <th style="width: 10%;">Doses <br> (Recommended Age)</th>
                    <th style="width: 10%;">Date of Vaccination</th>
                </tr>
            </thead>
            <tbody>
                  <tr>
                    <td> BCG </td>
                    <td> 1 <br>(Birth) </td>
                    <td>
                      <form action="/action_page.php">
                      <label for="datetime"> 1st Dose: </label>
                      <input type="datetime-local" id="dtlocal" name="datetime">
                      </form>
                    </td>
                  </tr>
                  <tr>
                    <td> HEPATITIS B </td>
                    <td> 1 <br>(Birth) </td>
                    <td>
                      <form action="/action_page.php">
                        <label for="datetime"> 1st Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="datetime">
                      </form>
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
                  </tr>
                  <tr>
                    <td> INACTIVATED POLIO VACCINE </td>
                    <td> 1 <br> (3 ½ months) </td>
                    <td>
                      <form action="/action_page.php">
                        <label for="datetime"> 1st Dose: </label>
                        <input type="datetime-local" id="dtlocal" name="datetime">
                      </form>
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
                      <br>
                      </form>
                    </td>
                  </tr>
                  <tr>
                    <td> OTHERS </td>
                    <td> -- </td>
                    <td> -- </td>
                  </tr>
     </tbody>
     </table>
</div>
</div>
</div></center>
<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>
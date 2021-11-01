<?php 
session_start();
error_reporting(0);
include("php/connection.php");
include("php/functions.php");

$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/parent_index.css">
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

   

                <div class="main-content">
            <div class="dashboard toShow">
                <div class="title">
                    <!-- <i class="fa fa-info-circle"></i> -->
                    <h1>Vaccine Information</h1>
                </div>
                <table style="height: 100px;">
                    <colgroup>
                        <col span="1" style="background-color: #b7b8b8">
                    </colgroup>
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
            </div><!-- Dashboard -->
        </div><!-- Main Content -->
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
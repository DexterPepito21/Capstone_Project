<?php 
session_start();

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
    <link rel="stylesheet" href="parent_index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard | Parent</title>
</head>
<body>Hello, <?php echo $user_data['parent_id']; ?>
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

      <div class="container">
       <h1 style="text-align: center;">VACCINE INFORMATION</h1>
       <div class="content">
       <table style="height: 300px;">
                    <colgroup>
                        <col span="1" style="background-color: #b7b8b8">
                    </colgroup>
                    <tr>
                        <th style="width: 18%;">Vaccine Name</th>
                        <th style="width: 100%;">Information</th>
                    </tr>
                    <tr>
                        <td>BCG</td>
                        <td>Protection from: Tuberculosis  
<br> When to give: At birth <br>  
Tuberculosis (TB) is an infection that most often attacks the lungs. In infants and young children, it affects other organs like the brain. A severe case could cause serious complications or death.

TB is very difficult to treat when contracted, and treatment is lengthy and not always successful.</td>
                    </tr>
                    <tr>
                        <td>HEPATITIS B</td>
                        <td>Protection from: Hepatitis B 
<br> When to give: At birth  <br>
Hepatitis B virus is a dangerous liver infection that, when caught as an infant, often shows no symptoms for decades. It can develop into cirrhosis and liver cancer later in life. Children less than 6 years old who become infected with the hepatitis B virus are the most likely to develop chronic infections.</td>
                    </tr>
                    <tr>
                        <td><strong>PENTAVALENT VACCINE</strong></td>
                        <td>
Protection from: Diphtheria, Pertussis, Tetanus, Influenza B and Hepatitis B <br>
When to give: 6, 10 and 14 weeks</td>
                    </tr>
                    <tr>
                        <td>ORAL POLIO VACCINE <br>&<br>INACTIVATED POLIO VACCINE</td>
                        <td>Protection from: Poliovirus <br> When to give: 6, 10 and 14 weeks <br>When to give: 14 weeks <br>
                        Polio is a virus that paralyzes 1 in 200 people who get infected. Among those cases, 5 to 10 per cent die when their breathing muscles are paralyzed. There is no cure for polio once the paralysis sets in.</td>  
                    </tr>
                    <tr>
                        <td>PNEUMOCOCCAL CONJUGATE</td>
                        <td>Protection from: Pneumonia and Meningitis <br>When to give: 6, 10 and 14 weeks <br>
 Pneumococcal diseases such as pneumonia and meningitis are a common cause of sickness and deathworldwide, especially among young children under 2 years old. </td>
                    </tr>
                    <tr>
                        <td>MEASLES, MUMPS, RUBELLA (MMR)</td>
                        <td>Protection from: Measles, Mumps and Rubella <br> When to give: 9 months and 1 year old  
 <br>Measles is a highly contagious disease with symptoms that include fever, runny nose, white spots in the back of the mouth and a rash. Serious cases can cause blindness, brain swelling and death.

Mumps can cause headache, malaise, fever, and swollen salivary glands. Complications can include meningitis, swollen testicles and deafness.

Rubella infection in children and adults is usually mild, but in pregnant women it can cause miscarriage, stillbirth, infant death or birth defects.
                    </td>
                    </tr>
                </table>
        </div>
    </div>          

                <!-- <div class="main-content">
            <div class="dashboard toShow">
                <div class="title"> -->
                    <!-- <i class="fa fa-info-circle"></i> -->
                    <!-- <h1>Vaccine Information</h1>
                </div>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th style="width: 30%;">vaccine</th>
                        <th style="width: 100%;">information</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT *, vaccine.vaccinename
                    FROM (vaccine_information
                    INNER JOIN vaccine ON vaccine_information.vaccine_id = vaccine.vaccine_id)";
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
    </div> -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
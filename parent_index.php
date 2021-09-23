<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>DASHBOARD | Parent</title>
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
          <li><a href="index.html" class="active"><i class="fas fa-home" id="icon"></i>Dashboard</a></li>
          <li><a href="child.html"><i class="fas fa-child"  id="icon"></i>Child Profile</a></li>
          <li><a href="chart.html"><i class="fa fa-chart-bar"  id="icon"></i>Vaccine Chart</a></li>
          <li><a href="guide.html"><i class="fas fa-book"  id="icon"></i>Nutrition Guide</a></li>
                  
          <div class="dropdown">
            <button class="dropbtn"><i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
            <a href="#"><i class="fas fa-sign-out-alt" id="icon"></i>Logout</a>
            </div>
          </div>
        </ul>
      </nav>

    <!-- Table -->
        <div class="main-content">
            <div class="dashboard toShow">
                <div class="title">
                    <!-- <i class="fa fa-info-circle"></i> -->
                    <h1>Vaccine Information</h1>
                </div>
                <table style="height: 300px;">
                    <colgroup>
                        <col span="1" style="background-color: #b7b8b8">
                    </colgroup>
                    <tr>
                        <th style="width: 18%;">BCG</th>
                        <th style="width: 100%;">(Information Here)</th>
                    </tr>
                    <tr>
                        <td>HEPATITIS B</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>PENTAVALENT VACCINE</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ORAL POLIO VACCINE</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>INACTIVATED POLIO VACCINE</td>
                        <td></td>
                    </tr>
                </table>
            </div><!-- Dashboard -->
        </div><!-- Main Content -->
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
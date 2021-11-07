<?php 
include("php/connection.php");
$chart_id = 363;
$query1 = "SELECT *, vaccine.vaccinename, healthcare_info.vaccinatorname, chart.dateofvaccination, healthcenter_tbl.healthcenter 
FROM (((chart
LEFT JOIN vaccine ON chart.vaccine_id = vaccine.vaccine_id)
LEFT JOIN healthcare_info ON chart.healthcare_id = healthcare_info.healthcare_id)
LEFT JOIN  healthcenter_tbl ON chart.healthcenter_id = healthcenter_tbl.healthcenter_id)
where chart_id='$chart_id'";
$result1 = mysqli_query($con,$query1); 
$rows1=mysqli_fetch_assoc($result1);
$dateofvaccination = $rows1['dateofvaccination'];
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
<input   type="date" class="m-wrap" value="<?php echo strftime('%Y-%m-%d', strtotime($dateofvaccination)); ?>" name="dateofvaccination" />
</body>
</html>
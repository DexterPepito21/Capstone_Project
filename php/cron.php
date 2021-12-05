<?php
function itexmo($number,$message,$apicode,$passwd){
    $url = 'https://www.itexmo.com/php_api/api.php';
    $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
    $param = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($itexmo),
        ),
    );
    $context  = stream_context_create($param);
    return file_get_contents($url, false, $context);
}
include("connection.php");

$date = date("Y/m/d", strtotime("+1 day"));
$today_date =strftime('%Y-%m-%d', strtotime($date));
echo $today_date.' is the date tommorow <br><br><br>';
$sql = "SELECT * FROM chart";
$result = mysqli_query($con,$sql);  
while($rows=mysqli_fetch_assoc($result)){
    
if(date("Y/m/d", strtotime($rows['dateofvaccination'])) == $date){
    $child_id=  $rows['child_id']; //child id
    $chart_id= $rows['chart_id'];
    $dateofvaccination = $rows['dateofvaccination'];
    $sql1 = "SELECT *, child_tbl.parent_id,vaccine.vaccinename, healthcenter_tbl.healthcenter 
    FROM (((chart
    LEFT JOIN child_tbl ON chart.child_id = child_tbl.child_id)
    LEFT JOIN vaccine ON chart.vaccine_id = vaccine.vaccine_id)
    LEFT JOIN  healthcenter_tbl ON chart.healthcenter_id = healthcenter_tbl.healthcenter_id)
    where chart.chart_id='$chart_id'";
    $result1 = mysqli_query($con,$sql1); 
    $rows1=mysqli_fetch_assoc($result1);
    $number_rows_chart=mysqli_num_rows($result1);
    echo $chart_id."chart id <br>";
    $parent_id =  $rows1['parent_id']; // parent id
    $vaccinename = $rows1['vaccinename']; //vaccine name
    $healthcenter = $rows1['healthcenter']; // health center
    $dose = $rows1['dose'];

    $sql2 = "SELECT parent_tbl.phonenum
    FROM (child_tbl
    LEFT JOIN parent_tbl ON child_tbl.parent_id = parent_tbl.parent_id)
    where child_tbl.parent_id='$parent_id'";
    $result2 = mysqli_query($con,$sql2); 
    $rows2=mysqli_fetch_assoc($result2);

    $phonenum =  $rows2['phonenum']; //phone number

    echo $child_id.'child id |';
    echo $parent_id.'parent id |';
    echo $phonenum.'phone number ';
    echo 'date of vaccination is'.$rows['dateofvaccination'].'<br>';
    echo "Your child is scheduled to have a " .$dose. " dose for " .$vaccinename. " vaccine tomorrow, " .$dateofvaccination. " in Brgy." .$healthcenter. " health center at 8:00 AM. <br>";
    // start here is the code for sending sms
    echo $phonenum.'<br>';
    
    $number = $phonenum;
    $api = "TR-DEXTE784273_EGBWI";
    $pass = "rc[c76\$c18";
    $text = "Your child will have its vaccine tomorrow at 8 AM Please see more details at childcaresystem.online";
    // $text = $message;
    //error here
    // itexmo($number,$text,$api,$pass);
   
    $notif_message = "Your child will have its vaccine tomorrow: ".$dateofvaccination;
    $query = "INSERT INTO comments(comment_subject, comment_text,parent_id)
    VALUES ('vaccine', '$notif_message','$parent_id')";
    mysqli_query($con, $query);
    

 }

}
$complete=mysqli_num_rows($result);
echo $complete;
?>
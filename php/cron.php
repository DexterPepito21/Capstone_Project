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
echo $today_date.' is the date today <br><br><br>';
$sql = "SELECT * FROM chart";
$result = mysqli_query($con,$sql);  
while($rows=mysqli_fetch_assoc($result)){
    
if(date("Y/m/d", strtotime($rows['dateofvaccination'])) == $date){
    $child_id=  $rows['child_id']; //child id
    
    $sql1 = "SELECT child_tbl.parent_id,vaccine.vaccinename
    FROM ((chart
    LEFT JOIN child_tbl ON chart.child_id = child_tbl.child_id)
    LEFT JOIN vaccine ON chart.vaccine_id = vaccine.vaccine_id)
    where chart.child_id='$child_id'";
    $result1 = mysqli_query($con,$sql1); 
    $rows1=mysqli_fetch_assoc($result1);

    $parent_id =  $rows1['parent_id']; // parent id
    $vaccinename = $rows1['vaccinename']; //vaccine name

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

    // start here is the code for sending sms
    // $number = $phonenum;
    // $api = "TR-PATPE797790_QMKWB";
    // $pass = "2[)ewnm4cn";
    // $text = "you are schedule to be vaccinated tommorrow";
    // itexmo($number,$text,$api,$pass);
    

 }else{
     echo "no <br>";
 }

}
$complete=mysqli_num_rows($result);
echo $complete;
?>
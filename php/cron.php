<?php
include("connection.php");
$date = date("Y/m/d");
$today_date =strftime('%Y-%m-%d', strtotime($date));
echo $today_date.'<br><br><br>';
$sql = "SELECT * FROM chart";
$result = mysqli_query($con,$sql);  
while($rows=mysqli_fetch_assoc($result)){
    
if(date("Y/m/d", strtotime($rows['dateofvaccination'])) == date('Y/m/d')){
    $child_id=  $rows['child_id'];
    
    $sql1 = "SELECT child_tbl.parent_id
    FROM (chart
    LEFT JOIN child_tbl ON chart.child_id = child_tbl.child_id)
    where chart.child_id='$child_id'";
    $result1 = mysqli_query($con,$sql1); 
    $rows1=mysqli_fetch_assoc($result1);
    $parent_id =  $rows1['parent_id'];
   

    $sql2 = "SELECT parent_tbl.phonenum
    FROM (child_tbl
    LEFT JOIN parent_tbl ON child_tbl.parent_id = parent_tbl.parent_id)
    where child_tbl.parent_id='$parent_id'";
    $result2 = mysqli_query($con,$sql2); 
    $rows2=mysqli_fetch_assoc($result2);
    $phonenum =  $rows2['phonenum'];
    echo $child_id.'child id |';
    echo $parent_id.'parent id |';
    echo $phonenum.'phone number ';
    echo 'date of vaccination is'.$rows['dateofvaccination'].'<br>';
 }else{
     echo "no <br>";
 }

}
$complete=mysqli_num_rows($result);
echo $complete;
?>
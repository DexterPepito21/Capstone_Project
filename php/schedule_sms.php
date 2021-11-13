<?php
include("connection.php");
	// Account details
$apiKey = urlencode('Your apiKey');

if(isset($_POST['update'])){
    
	// Message details
	$numbers = $_POST['numbers'];
	$sender = urlencode($_POST['sender']);
	$message = rawurlencode($_POST['message']);
    $schedule_time = $_POST['date'];

	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message, "schedule_time" => $schedule_time);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
}
?>

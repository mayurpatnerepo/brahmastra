<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo1";
header("Access-Control-Allow-Origin: *");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM otp_verify where mobile='".$_GET['phone']."' and otp='".$_GET['otp']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	/*
	 // Authorisation details.
	$username = "";
	$hash = "";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "SLBABA"; // This is who the message appears to be from.
	$numbers = "91".$_GET['phone']; // A single number or a comma-seperated list of numbers
	$message = Registration : You have successfully created your account in sealantbaba.comm Please update your Account details in My Account page. Thank You.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	*/
   echo"yes";
} else {
    echo "no";
}

?>


<?php
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
$rand=rand(100000,1000000);
$sql = "INSERT INTO otp_verify (mobile, otp, status)VALUES ('".$_GET['phone']."', '$rand', '0')";

if ($conn->query($sql) === TRUE) {
    
    // Authorisation details.
	$username = "TXTLCL";
	$hash = "SrbV3i6XlcU-R273rShr6QteUFP8xIl00KBotpVxF1";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = urldecode('TXTLCL'); // This is who the message appears to be from.
	$numbers = "91".$_GET['phone']; // A single number or a comma-seperated list of numbers
	$message = $rand." is the One Time Password (OTP) for your Brahmastra.com account.";
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
			echo"yes";

    
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
?>
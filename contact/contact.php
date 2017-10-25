<?php
$servername = "localhost";
$username = "compufes_harsh";
$password = "hash@2212";
$dbname = "compufes_15";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} //else { echo " Connected";}

//CHECK USERNAME
$name= $_POST['q1'];
$email = $_POST['q2'];
$message = $_POST['q6'];
$sql = "INSERT INTO `event`(`name`, `email`, `message`) VALUES ('$name','$email','$message')";
	
	if ($conn->query($sql) === TRUE) {
	echo "<script> alert('your request is submitted');</script>";
	echo "<a href='http://www.compufest.in/'>HOME</a>";
	} 
	
	else {    echo "Error: " . $sql . "<br>" . $conn->error; }
$conn->close();
?>
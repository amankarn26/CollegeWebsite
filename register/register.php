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
$phone=$_POST['q3'];
$email = $_POST['q2'];
$college = $_POST['q4'];
$event = $_POST['q5'];
$message = $_POST['q6'];
$sql = "INSERT INTO `event`(`name`, `email`, `phone`, `college`, `event`, `message`) VALUES ('$name','$email',$phone,'$college','$event','$message')";
	
	if ($conn->query($sql) === TRUE) {
	echo "<script> alert('Congratulation, You are Registered, we will contact you soon');</script>";
		echo "<a href='http://www.compufest.in/'>HOME</a>";
	} 
	
	else {    echo "Error: " . $sql . "<br>" . $conn->error; }
$conn->close();
?>
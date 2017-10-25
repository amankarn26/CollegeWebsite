<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xam";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} //else { echo " Connected";}



$regid= $_GET['regid'];
$sql = "SELECT * FROM `questions` WHERE 1";
$i=0;
$j=0;
$result = mysqli_query($conn,$sql);
if($result->num_rows >0)
{

  while($row = $result->fetch_assoc())
  {

  	$j=$j+1;
  	$option=$row['answer'];
  	
  	if(isset($_GET["q"."$j"])){
  		$var=$_GET["q"."$j"];
  		if(strcmp($var,$option)==0)
  		{$i=$i+1;}
  	}//isset
  } //while

} //if
else {    echo "Error: " . $sql . "<br>" . $conn->error; }

if($i==5)$valid=1;
	else$valid=0;

$sql = "INSERT INTO `user`(`regid`, `score`, `valid`) VALUES ('$regid',$i,$valid)";
	if($result = mysqli_query($conn,$sql))
	{}
	else
	{echo "Error: " . $sql . "<br>" . $conn->error; }

if($valid==1)
	{	
	echo "<h1>score: ".$i."/5 (We have saved your REGISTRATION ID, just ask for offer at event help desk)</h1>";
	}
else
{echo "<h1>score: ".$i."/5 (No Offers)</h1>";}


$conn->close();
?>
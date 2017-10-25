<html>
<head>
	<title>Challange</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/bootstrap.min.js"></script>
</head>


<script type="text/javascript">

  function myfunc(){
  var frm = document.getElementById("myform").submit();
    frm.submit();
  }

window.setInterval("myfunc()",30000);

var count = 31;
//var redirect = "http://www.compufest.in";
 
function countDown(){
    var timer = document.getElementById("timer");
    if(count > 0){
        count--;
        timer.innerHTML = ""+count+"";
        setTimeout("countDown()", 1000);
    }else{
       // window.location.href = redirect;
    }
}
</script>

<body>

<nav class="navbar navbar-default" align="center">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
    <h2 Compufest Offers>COMPUFEST OFFERS</h2>
    <div>
    </div>
  </div>
</nav>


<div class="container">
  



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



//CHECK USERNAME
$regid= $_GET['regid'];

$sql = "SELECT 'regid' FROM `user` WHERE regid='".$regid."'";

$i=0;

$result = mysqli_query($conn,$sql);
if($result->num_rows <=0)
{
 
echo "
  
  <form role='form' id='myform' method='GET' action='result.php'>

  <div class='jumbotron' align='center'>
    <h3>Answer The Questions within 
    <span id='timer'><script type='text/javascript'>countDown();</script></span>
    sec...HURRY!!!</h3> 
    <div class='form-group'>
      <label >Reciept Number / Registration ID Number</label>
      <input type='text' class='form-control' name='regid' id='text' value='".$regid."' readonly>
    </div>
  </div>


 
 <div class='row'>
    <div class='col-sm-8'>
  ";

$sql = "SELECT * FROM `questions` WHERE 1";

$i=0;

$result = mysqli_query($conn,$sql);
if($result->num_rows >0)
{

  while($row = $result->fetch_assoc())
  {

  
    $i=$i+1;

  echo "

 

  
      

      <h3>Question ".$i." :".$row['question']."  </h3>
      <div class='radio'>
        <label><input type='radio' name='q".$i."' value='o1'>".$row['o1']."</label>
      </div>
      <div class='radio'>
         <label><input type='radio' name='q".$i."' value='o2'>".$row['o2']."</label>
      </div>
      <div class='radio'>
        <label><input type='radio' name='q".$i."' value='o3'>".$row['o3']."</label>
      </div>
      <div class='radio'>
         <label><input type='radio' name='q".$i."' value='o4'>".$row['o4']."</label>
      </div>";

  } //while

} //if
else {    echo "Error: " . $sql . "<br>" . $conn->error; }

}//top if ends

else
{echo "<h1>You Have Already Played With This ID, Try Next Day</h1>";}

$conn->close();
?>





    </div>
  </div>



 
<button type='submit' class='btn btn-default'>Submit</button>

</div><!--container-->
</form>
  
  
  
 







<nav class="navbar navbar-default" align="center">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
   Copyrights &copy; 2015 COMPUFEST
    <div>
    </div>
  </div>
</nav>







</body>
</html>
<html>
<body>
<style>
p2 {
  position: absolute;
  top: 10px;
  right: 9px;
  font-size: 18px;
  color:white;
}
p3 {
  font-size: 30px;
  color:#e32526;
}


.header {
  background: #e32526;
}

</style>
<div class="header">
<img src="AirAsia_logo.png" alt="Airasia Logo" width:"200" height="200">
</div>


<h1 style="font-size:40px;color:#e32526;"><center> Purchase Page </center></h1>
<p2><b><?php
// Display Date
date_default_timezone_set("Asia/Kuala_Lumpur"); 
$date=date('Y/m/d');
echo "Today's Date: ".$date;
?></b></p2>

<table>


<?php

// Connect to Database
$conn = mysqli_connect("localhost","root","","sample2 (1)");
session_start();
if($conn==false) echo " No database Connected. ";
// Get Schedule ID from the Homepage.php
$_SESSION["schedule_ID"]=$_GET["scheduleid"];
$scheduleid = $_SESSION["schedule_ID"];

// Select data from flight schedule and check with the same shcedule ID from the Homepage.php

$result= mysqli_query($conn,"SELECT * FROM flight_schedule WHERE Schedule_ID = '$scheduleid'");

// if there is data in the database
if($result->num_rows > 0){

// Then Use the while loop function to display depart airport and arrive airport from the database
while($row = mysqli_fetch_array($result))
{
	echo "<br><p3><center>".$row['depart_airport']." ==> ".$row['arrive_airport']."</center></p3>";
	$_SESSION["depart_airport"]=$row['depart_airport'];
	$_SESSION["arrive_airport"]=$row['arrive_airport'];
}

$conn->close();
}
?>
</table>
<form action="purchase2.php" method="POST">
<table>
<br><br><tr><td><b> Choose a Class </b></td></tr>
<tr><td> Business Class </td><td><input type="radio" name="business" ></td></tr>
<tr><td> Economy Class </td><td><input type="radio" name="economy"></td></tr>
</table>

<table>
<br><br><tr><td><b>Choose a Seat</b></td></tr>
<tr><td><input type="text" maxlength="3" name="seat" placeholder="A-Z,1-30 ie: 'B28'"required></td></tr>
</table>

<table>
<br><br><tr><td><b> Payment Option </b></td></tr>
<tr><td> Online Banking </td><td><input type="radio" name="online"></td></tr>
<tr><td> Credit Card/ Debit Card </td><td><input type="radio" name="card"></td></tr>
</table>

<table>
<br><br><tr><td><b> IC Number </b></td></tr>
<tr><td><input type="text" name="IC_Number"></td></tr>
</table>

<table>
<br><br><tr><td><b> Name </b></td></tr>
<tr><td><input type="text" name="Cust_Name"></td></tr>
</table>

<br>

<a href="Homepage.php"style="text-decoration:none;border:none;color: white;padding: 15px 32px;background-color: #e32526;">BACK</a>
<button style="border:none;color: white;padding: 15px 32px;background-color: #e32526;">NEXT</button>
</form>

</body>
</html>

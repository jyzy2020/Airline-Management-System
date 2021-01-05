<html>
<body>
<style>
p2 {
  position: absolute;
  margin-left:20px;
  top: 8px;
  right: 10px;
  font-size: 18px;
  color:white;
}
p3 {
  font-size: 30px;
  color:#e32526;
  margin-left:20px;
}p4{
	font-size: 15px;
	margin-left:20px;
}

p5 {
text-align: center;
  font-size: 30px;
  color:#e32526;
  margin-left:20px;
}
.header {
  background: #e32526;
}

</style>
<div class="header">
<img src="AirAsia_logo.png" alt="Airasia Logo" width:"200" height="200">
</div>

<form action="purchase3.php" method="POST">
<h1 style="font-size:40px;color:#e32526;"><center> Confirmation Page </center></h1>
<p2><b><?php
date_default_timezone_set("Asia/Kuala_Lumpur"); 
$date=date('Y/m/d h:ia');
echo "Today's Date & Time: ".$date;

?></b></p2>

<table style="margin-left:20px">
<?php
// Using POST method to get data from previous page which is purchase.php

$ic=$_POST["IC_Number"];
$name=$_POST["Cust_Name"];
// Display IC Number and Name 

echo "<tr><td><b>IC Number: </td></b><td>$ic</td></tr>";
echo "<tr><td><b>Name: </td></b><td>$name</td></tr>";

$seat=$_POST["seat"];

// Connect to Database
$conn = new mysqli("localhost", "root", "", "sample2 (1)");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Session Started to store data
session_start();
$_SESSION["date"]=$date;
$passport=$_SESSION["Passport_ID"];
echo "<tr><td><b>Passport ID: </td></b><td>$passport</td></tr>";
$id=$_SESSION["schedule_ID"];
$depart=$_SESSION["depart_airport"];
$arrive=$_SESSION["arrive_airport"];
echo "<tr><td><b>Depart from: </td></b><td>$depart</td></tr>";

echo "<tr><td><b>Arrive at: </td></b><td>$arrive</td></tr>";


// Use the function of randomize number to create ticket ID 
$fourRandomDigit = rand(0,9999);
    echo "<br><br><p3>Ticket ID: ".$fourRandomDigit."</p3>";

echo "<tr><td><b>Purchase Date & Time:  </td></b><td>$date</td></tr>";


 $conn = mysqli_connect("localhost","root","","sample2 (1)");

if($conn==false) echo " No database Connected. ";

// Find the same Schedule ID from the Database
$result= mysqli_query($conn,"SELECT * FROM flight_schedule WHERE Schedule_ID = '$id'");

// If there is same Schedule ID from the Database then display the Estimate Duration
while($row = mysqli_fetch_array($result))
{
	echo "<tr><td><b> Estimate Duration: </b> </td><td>".$row['est_duration']."</td> </tr> ";
	
}
// Connection of Database Closed
$conn->close();

// If user choose Business Class from the previous page
if(isset($_POST["business"])){
$conn = mysqli_connect("localhost","root","","sample2 (1)");
if($conn==false) echo " No database Connected. ";

$result= mysqli_query($conn,"SELECT * FROM flight_schedule WHERE Schedule_ID LIKE '%{$id}%'");

// Display ticket price from the database and add another RM500 for business class
while($row = mysqli_fetch_array($result))
{
	$totalprice=$row['ticket_price']+500;
}
$conn->close();
	$class = "Business Class" ;
	echo "<tr><td><b>Type of Class:  </td></b><td>$class</td></tr><br>";
	
// If user choose economy class from the previous page	
}else if(isset($_POST["economy"])){
$conn = mysqli_connect("localhost","root","","sample2 (1)");
if($conn==false) echo " No database Connected. ";

$result= mysqli_query($conn,"SELECT * FROM flight_schedule WHERE Schedule_ID LIKE '%{$id}%'");

// Display the ticket price 
while($row = mysqli_fetch_array($result))
{
	$totalprice=$row['ticket_price'];
}
// Connection of Database Closed.
$conn->close();

// Displaying the data of economy class
	$class = "Economy Class" ;
	echo "<tr><td><b>Type of Class:  </td></b><td>$class</td></tr><br>";
}else{
// If user didnt choose any class it will be shows no class selected.
	echo " No Class Selected ";
}


$_SESSION["ticketprice"]=$totalprice;

// Display Seat ID
echo "<tr><td><b>Seat ID:  </td></b><td>$seat</td></tr><br>";

// If user choose Online Banking from the previous page then Display Online Banking
if(isset($_POST["online"])){
	$payment = "Online Banking " ;
	echo "<tr><td><b>Payment Option:  </td></b><td>$payment</td></tr><br>";
	
// If user choose Pay by Card from the previous page then Display Credit /  Debit Card	
}else if(isset($_POST["card"])){
	$payment = "Credit / Debit Card" ;
	echo "<tr><td><b>Payment Option:  </td></b><td>$payment</td></tr><br>";
}else{
	echo " No Payment Selected ";
}
echo"</table>";

echo "<br><br><p5>Total Price: RM".$totalprice."</p5>";


// Store All of the Data to Session 
$_SESSION["Digit"]=$fourRandomDigit;
$_SESSION["Class"]=$class;
$_SESSION["Seat"]=$seat;
$_SESSION["TotalPrice"]=$totalprice;
$_SESSION["Payment"]=$payment;
$_SESSION["IC"]=$ic;
$_SESSION["Name"]=$name;



?>
<br> 
<br>
<a href="Homepage.php" style="text-decoration:none; color: white;text-align: center;padding: 15px 32px;background-color: #e32526;">CANCEL</a>
<button style="border:none;color: white;text-align: center;padding: 17px 34px;background-color: #e32526;">CONFIRM</button>

</form>
</body>
</html>

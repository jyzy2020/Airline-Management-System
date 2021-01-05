
<!-- Purchased ticket (check in) Home page -->

<html>
<body>

<style>

form {
    display: inline-block;
	margin-right: 10px;
}

.header {
  background: #e32526;
  margin: auto;
	width: 100%;
  height: 200px;
}


input[type=submit] {
  background-color: #ff0000;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}


p2 {
  position: absolute;
  top: 12px;
  right: 10px;
  font-size: 20spx;
  color:white;
}

.tab {
  overflow: hidden;
  background-color: #f1f1f1;
  width: 343px;
}

.tab button {
  background-color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

.tab2 {
  background-color: red;
  float: left;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

.tab button:hover {
  background-color: #ddd;
}
.tab button.active {
  background-color: #ccc;
}
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

table,th,td{
        padding: 10px;
        border: 2px solid black;
        border-collapse: collapse;
		padding-right: 90px;
}

</style>


<p2><b><?php
//date shown
date_default_timezone_set("Asia/Kuala_Lumpur"); 
$date=date('Y/m/d');
echo "Today's Date: ".$date;
?></b></p2>

<div class="header">
<img src="AirAsia_logo.png" alt="Airasia Logo" width:"200" height="200">
</div >

<h1 style="font-size:40px;color:red;"><center>Welcome
 <?php
session_start(); 

//saved the passport id and name of the customer that signed in
$passportid = $_SESSION["Passport_ID"];
$name=$_SESSION["Cust_Name"];
//show the name of the customer that is signed in
echo $name;

?> </center></h1>


<div class="tab">
  <a href="Homepage.php"><button class="tablinks" onclick="openCity(event, 'availableSchedule')">Available Schedule</button></a>
  <a href="purchasedtickets.php"><button class="tablinks" onclick="openCity(event, 'purchasedtickets')">Purchased tickets</button></a>
</div>
<form action="checkin.php" method="POST">
 <table>
 <br><tr><td>Ticket ID</td><td>Class</td><td>Seat</td><td>IC Number</td><td>Full Name</td>
<td>Schedule</td><td>Status</td><td>Action</td></tr>
 <?php
 $conn = mysqli_connect("localhost","root","","sample2 (1)");

if($conn==false) echo " No database Connected. ";

$i=0;

//query all the data from the flight ticket table that matches the passport id of the signed in user
$result= mysqli_query($conn,"SELECT * FROM flight_tickets WHERE Passport_ID='$passportid'");

//show all the tickets that are queried from the database
while($row = mysqli_fetch_array($result))
{
	echo "<tr><td>".$row['Ticket_ID']."</td>
	<td>".$row['Class']."</td><td>".$row['Seat_No']."</td><td>".$row['IC_number']."</td><td>".$row['Full_name']."</td>"
?>  
	<!-- Button for customer to view the schedule details of their purchased ticket -->
	<td><a href="custViewSchedule.php?scheduleid=<?php echo $row['Schedule_ID'];?> ">View Schedule!</a></td>
<?php
	echo "<td>".$row['Status']."</td>";
	
	//if customer havent check in, it will show a check in button, if they checked in, the button wont appear
	if ($row['Status'] == 'not-checked-in'){
?>
	<!-- Check in button -->
	<td> <a href="checkin.php?scheduleid=<?php echo $row['Schedule_ID'];?>&
	ticketid=<?php echo $row['Ticket_ID'];?>">Check In</a></td></td></tr>
<?php
	}
	else if ($row['Status'] == 'checked-in'){
		echo "<td> </td> </td></tr>";
	}
}
$conn->close();
?>
</form>
</table>


<br><br>

<!-- Logout button -->
<center>
<form action="logout.php" method="POST">
<a href="Logout.php"><button style="border:none;color: white;padding: 15px 32px;background-color: #e32526;">LOGOUT</button>
</form>
</center>

<br>
<br>
</body></html>
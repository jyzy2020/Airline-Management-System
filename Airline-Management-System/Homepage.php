<html>

<head>
<style type=text/css>

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
		padding-right: 130px;
      }
	  
	 
</style>
</head>

<body>
<p2><b><?php
// Display Date 
date_default_timezone_set("Asia/Kuala_Lumpur"); 
$date=date('Y/m/d');
echo "Today's Date: ".$date;
?></b></p2>

<div class="header">
<img src="AirAsia_logo.png" alt="Airasia Logo" width:"200" height="200">
</div >


<h1 style="font-size:40px;color:red;"><center>Welcome
 <?php
 // Session Start to store data
session_start(); 

$name=$_SESSION["Cust_Name"];
echo $name;
?> </center></h1>

<div class="tab">
  <a href="Homepage.php"><button class="tablinks" onclick="openCity(event, 'availableSchedule')">Available Schedule</button></a>
  <a href="purchasedtickets.php"><button class="tablinks" onclick="openCity(event, 'purchasedtickets')">Purchased tickets</button></a>
</div>
<form action="purchase.php" method="POST">
 <table>
 <br><tr><td>Depart Airport</td><td>Arrive Airport</td><td>Depart Datetime</td><td>Estimate Duration</td>
<td>Availability</td><td></td></tr>
 <?php
 // Connect to Database
 $conn = mysqli_connect("localhost","root","","sample2 (1)");

if($conn==false) echo " No database Connected. ";

// Select Data from the table of Flight_Schedule

$result= mysqli_query($conn,"SELECT * FROM flight_schedule");

// Using While Loop to Display all of the data from the database

while($row = mysqli_fetch_array($result))
{
	echo "<tr><td>".$row['depart_airport']." </td><td> ".$row['arrive_airport']."</td><td>".$row['depart_datetime']."</td><td>".$row['est_duration'].
	"</td><td>".$row['availability']."</td><td>";
	if($row["availability"] == "available"){
	echo "<a href=purchase.php?scheduleid=".$row['Schedule_ID'].">Purchase Now!</a></td></tr>";
	}else if($row["availability"] == "not available"){
	echo " ";
	}
	
}

// Connection database closed
$conn->close();

?>

</form>
</table>

<br><br>
<center>
<form action="logout.php" method="POST">
<a href="Logout.php"><button style="border:none;color: white;padding: 15px 32px;background-color: #e32526;">LOGOUT</button>
</form>
</center>
<br>
<br>
</body></html>
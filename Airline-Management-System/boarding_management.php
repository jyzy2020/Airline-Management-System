<!DOCTYPE html>

<!-- Boarding Management Home Page -->

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Boarding Management</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style type="text/css">

h3{
  border-style: solid;
  margin: auto;
  width: 100%;
  height: 100%;
  font-size: 15px;
}

.headerlogo {
  background: #e32526;
}

.header{
  color: white;
  font-size:30px;
  position:absolute;
  top:10%;
  right:50%;
  width:500px;
  left:43%;
}

.tab {
  overflow: hidden;
  width: 361px;
  margin-left: 90px;
  border-bottom: 1px solid black;
  border-left: 1px solid black;
  border-right: 1px solid black;
}

.tab button {
  background-color: white;
  float: left;
  border-right: 1px solid black;
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
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

.tab button:hover {
  background-color: #ddd;
}
.tab button.active {
  background-color: #ccc;
}

</style>

<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>

</head>

<body>

<div class="headerlogo">
<img src="AirAsia_logo.png" alt="Airasia Logo" width:"200" height="200">
<div class="header">Welcome <?php 
session_start();
echo $_SESSION ['Staff_name']?></div>
</div ><br>

<h3>
<!-- Buttons to switch between two main pages -->
<div class="tab">
  <a href="flight_schedule.php"><button class="tablinks" onclick="openCity(event, 'flightschedule')">Flight Schedules</button></a>
  <a href="boarding_management.php"><button class="tablinks" onclick="openCity(event, 'boardingmanagement')">Boarding Management</button></a>
</div>

<br><br>

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">

<h2 class="pull-left">Boarding Management</h2> <br>

<!-- HTML search for schedule-->
<p> Search for schedules using Schedule ID</p>
<form action="bm_search.php" method="post">
<label for="scheduleid">Schedule ID: </label>
<input type="text" name="scheduleid" size="40">
<input type="submit" value="Submit" style="margin-left:30px; width:100px">
</form> <br>

<!-- HTML search for customers-->
<p> Search for customers using Passport ID</p>
<form action="flight_customers.php" method="post">
<label for="passportid">Passport ID: </label>
<input type="text" name="passportid" size="40">
<input type="submit" value="Submit" style="margin-left:30px; width:100px">
</form> <br>

</div>

<?php
$conn = mysqli_connect("localhost", "root", "", "sample2 (1)");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//query all the data from flight_tickets table
$result = mysqli_query($conn,"SELECT * FROM flight_tickets");
?>
<?php

//display all the data in table form
if (mysqli_num_rows($result) > 0) {
?>
<table class='table table-bordered table-striped'>
<tr>
<td>Schedule ID</td><td>
<td>Ticket ID</td><td>
<td>Class</td><td>
<td>Seat No</td><td>
<td>Passport ID</td><td>
<td>Status</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["Schedule_ID"]; ?> <br>
<!-- Button for user to view the selected schedule -->
<a style="font-size:13px;" href="flight_schedule2.php?userid=<?php echo $row["Schedule_ID"]; ?>">View Schedule</a></td><td>
<td><?php echo $row["Ticket_ID"]; ?></td><td>
<td><?php echo $row["Class"]; ?></td><td>
<td><?php echo $row["Seat_No"]; ?></td><td>
<td><?php echo $row["Passport_ID"]; ?></td><td>
<td><?php echo $row["Status"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
<?php
}
else{
echo "No result found";
}

?>
</div>
</div>        
</div>
</div>
</h3>

<br><br>
<center>
<form action="logout.php" method="POST">
<a href="Logout.php"><button style="color: white;padding: 15px 32px;background-color: #e32526;">LOGOUT</button>
</form>
</center>
<br>
<br>

</body>
</html>
<!DOCTYPE html>

<!-- Flight Schedule Home Page -->

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Flight Schedule Records</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">

form {
    display: inline-block;
	margin-right: 10px;
}

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

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">
<div class="pull-left">
<h2 style="margin-top:34px">Flight Schedule Records</h2> <br>

<!-- Add new schedule button -->
<form method="post" action="flight_schedule_add.php">
<input style="width:180px;height:30px;" type="submit" value="Add a new schedule">
</form>

<!-- Add new team button -->
<form method="post" action="flight_team_add.php">
<input style="width:180px;height:30px;" type="submit" value="Add a new flight team">
</form> 

</div> <br>
<?php
$conn = mysqli_connect("localhost", "root", "", "sample2 (1)");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//query all data from flight schedule table
$result = mysqli_query($conn,"SELECT * FROM flight_schedule");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>

<!-- Display all schedule record in a table -->
<table class='table table-bordered table-striped'>
<tr>
<td>Schedule ID</td>
<td>Depart Airport</td>
<td>Arrive Airport</td>
<td>Depart Date & time</td>
<td>Gate Number</td>
<td>Estimate Duration</td>
<td>Check In Baggage Counter</td>
<td>Availability</td>
<td>Ticket Price</td>
<td>Team Id</td>
<td>Action</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["Schedule_ID"]; ?></td>
<td><?php echo $row["depart_airport"]; ?></td>
<td><?php echo $row["arrive_airport"]; ?></td>
<td><?php echo $row["depart_datetime"]; ?></td>
<td><?php echo $row["gate_no"]; ?></td>
<td><?php echo $row["est_duration"]; ?></td>
<td><?php echo $row["CheckinBaggage_counter"]; ?></td>
<td><?php echo $row["availability"]; ?></td>
<td><?php echo $row["ticket_price"]; ?></td>
<td><?php echo $row["Team_ID"]; ?><br><br>
<!-- Button for staff to view the particular flight team's details-->
<a  style="font-size:11px" href="flight_teams1.php?teamid=<?php echo $row["Team_ID"]; ?>">Edit Team</a></td>
<td>
<!-- Button for staff to update a particular flight schedule -->
<a href="flight_schedule1.php?userid=<?php echo $row["Schedule_ID"]; ?>">Update</a><br><br>
<!-- Button for staff to delete a particular flight schedule -->
<a href="schedule_delete_confirmation.php?userid=<?php echo $row["Schedule_ID"]; ?>">Delete</a></td>
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
</h2>

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
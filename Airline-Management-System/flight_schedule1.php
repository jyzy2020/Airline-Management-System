
<!-- Update particular schedule from database-->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Flight Schedule Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
.wrapper{
width: 500px;
margin: 0 auto;
}
</style>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
<h2>Update Flight Schedule Record</h2>
</div>
<p>Please input management id and password to update!</p>

<p>Please edit the input values and submit to update the record.</p><br>

<?php
$conn = mysqli_connect("localhost", "root", "", "sample2 (1)");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if(count($_POST)>0) {
$manID = $_POST ['manager_id'];
$manPass = $_POST ['manager_password'];

//if else to check the validity of manager ID
$idsearch = "SELECT Manager_ID FROM manager WHERE Manager_ID = '$manID'";
$result1=mysqli_query($conn, $idsearch);
if(mysqli_num_rows($result1)>0) {

$passsearch = "SELECT Password FROM manager WHERE Password = '$manPass'";
$result2=mysqli_query($conn, $passsearch);

//if else to check the validity of manager Password
if(mysqli_num_rows($result2)>0) {

//if manager ID and password are valid, updated input will be updated in database
mysqli_query($conn,"UPDATE flight_schedule set Schedule_ID='" . $_POST['Schedule_ID'] . "', depart_airport='" . $_POST['depart_airport'] . "'
,arrive_airport='" . $_POST['arrive_airport'] . "', depart_datetime='" . $_POST['depart_datetime'] . "',gate_no='" . $_POST['gate_no'] . "'
, est_duration='" . $_POST['est_duration'] . "',CheckinBaggage_counter='" . $_POST['CheckinBaggage_counter'] . "'
, availability='" . $_POST['availability'] . "'
, ticket_price='" . $_POST['ticket_price'] . "' WHERE  Schedule_ID='" . $_POST['Schedule_ID'] . "'");

//message is shown if schedule is updated succesfully in database
$message = "<p align=center style='color:teal'>Record Modified Successfully!</p><br>";
echo $message;
}
else {
	//if manager Password is invalid, error message is shown
	echo "<p align=center style='color:red'>Manager Password is not valid!</p><br>";
}
}
else {
	//if manager ID is invalid, error message is shown
	echo "<p align=center style='color:red'>Manager ID is not valid!</p><br>";
}
}

/* Data that are queried from the database about a particular schedule will be
shown in a table, for staff to update */
$scheduleid = $_GET['userid'];
$result = mysqli_query($conn,"SELECT Schedule_ID,depart_airport,arrive_airport,
depart_datetime,gate_no,est_duration,CheckinBaggage_counter,availability,
ticket_price,team_id FROM flight_schedule WHERE Schedule_ID='$scheduleid'");
$row= mysqli_fetch_array($result);
?>
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI']));?>" method="post">
<div>
<label>Manager ID</label>
<input type="text" name="manager_id" class="form-control" required>
</div>
<div class="form-group">
<label>Manager Password</label>
<input type="password" name="manager_password" class="form-control" required>
</div>
<div class="form-group">
<label>Schedule ID</label>
<input type="text" name="Schedule_ID" class="form-control" value="<?php echo $row["Schedule_ID"];?>">
</div>
<div class="form-group">
<label>Depart Airport</label>
<input type="text" name="depart_airport" class="form-control" value="<?php echo $row["depart_airport"];?>">
</div>
<div class="form-group ">
<label>Arrive Airport</label>
<input type="text" name="arrive_airport" class="form-control" value="<?php echo $row["arrive_airport"];?>">
</div>
<div class="form-group ">
<label>Depart Date & Time</label>
<input type="text" name="depart_datetime" class="form-control" value="<?php echo $row["depart_datetime"];?>">
</div>
<div class="form-group ">
<label>Gate Number</label>
<input type="text" name="gate_no" class="form-control" value="<?php echo $row["gate_no"];?>">
</div>
<div class="form-group ">
<label>Estimate Duration</label>
<input type="text" name="est_duration" class="form-control" value="<?php echo $row["est_duration"];?>">
</div>
<div class="form-group ">
<label>Check In Baggage Counter</label>
<input type="text" name="CheckinBaggage_counter" class="form-control" value="<?php echo $row["CheckinBaggage_counter"];?>">
</div>
<div class="form-group ">
<label>Availability</label>
<input type="text" name="availability" class="form-control" value="<?php echo $row["availability"];?>">
</div>
<div class="form-group ">
<label>Ticket Price</label>
<input type="text" name="ticket_price" class="form-control" value="<?php echo $row["ticket_price"];?>">
</div>
<input type="hidden" name="Schedule_ID" value="<?php echo $row["Schedule_ID"]; ?>"/>
<input type="submit" class="btn btn-primary" value="Submit">

<!-- Back button -->
<a href="flight_schedule.php" class="btn btn-default">Cancel</a> <br> <br> <br>
</form>
</div>
</div>        
</div>
</div>

</body>
</html>
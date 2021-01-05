
<!-- Server page to add a new schedule into database -->

<html lang="en">
<head>
<meta charset="UTF-8">
<title>New Schedule Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style>
	.box{
	max-width:100%;
	padding:30px;
	border:1px solid black;
	margin: auto;
	}
	
.wrapper{
width: 500px;
margin: 0 auto;
}

label {
	width: 140px;
	display: inline-block;
	margin-right: 1px;
	margin-bottom: 5px;
}
</style>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "", "sample2 (1)");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if($_POST['save'])
{	 
	 $manID = $_POST ['manager_id'];
	 $manPass = $_POST ['manager_password'];
	 $Schedule_ID=$_POST['Schedule_ID'];
	 $depart_airport=$_POST['depart_airport'];
	 $arrive_airport=$_POST['arrive_airport'];
	 $depart_datetime=$_POST['depart_datetime'];
	 $gate_no=$_POST['gate_no'];
	 $est_duration=$_POST['est_duration'];
	 $CheckinBaggage_counter=$_POST['CheckinBaggage_counter'];
	 $availability=$_POST['availability'];
	 $ticket_price=$_POST['ticket_price'];
	 $team_id=$_POST['team_id'];

$idsearch = "SELECT Manager_ID FROM manager WHERE Manager_ID = '$manID'";
$result1=mysqli_query($conn, $idsearch);

//if else to check the validity of manager ID
if(mysqli_num_rows($result1)>0) {

$passsearch = "SELECT Password FROM manager WHERE Password = '$manPass'";
$result2=mysqli_query($conn, $passsearch);

//if else to check the validity of manager Password
if(mysqli_num_rows($result2)>0) {

	 //if both ID and Password are correct, save the record in database
	 $sql = "INSERT INTO flight_schedule (Schedule_ID,depart_airport,arrive_airport,
	 depart_datetime,gate_no,est_duration,CheckinBaggage_counter,availability,
	 ticket_price,team_id) VALUES ('$Schedule_ID','$depart_airport',
	 '$arrive_airport','$depart_datetime','$gate_no','$est_duration',
	 '$CheckinBaggage_counter','$availability','$ticket_price','$team_id')";
	 
	 //Message shown if schedule is added, a back button is also provided
	 if (mysqli_query($conn, $sql)) {
		echo "<div class='box'>";
		echo "<div style='text-align:center;font-size:30px'><b>  New Schedule Added! </b></div><br><br>";

?>
<br><br>
<div style="text-align:center">  
<a href="flight_schedule.php" style="font-size:18px">Back to record</a>
</div>
</div>
<?php
}
else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
}

//if manager password is invalid, show an error message and allow staff to retype
else {
?>
<form style="text-align:center" method="post" action="process_schedule.php">
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
<h2>Add Flight Schedule Record</h2>
</div>
<p>Please enter a new record.</p>
<p>Please enter the correct manager ID and manager password.</p><br>

<?php
	echo "<p align=center style='color:red'>Manager Password is not valid!</p><br>";
?>
<form  action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI']));?>" method="post">
		<label>Manager ID:</label>
		<input type="text" name="manager_id" required>
		<br><br>
		<label>Manager Password:</label>
		<input type="password" name="manager_password" required>
		<br><br>
        <label>Schedule ID:</label>
		<input type="text" name="Schedule_ID" value="<?php echo $Schedule_ID;?>" required>
		<br><br>
		<label>Depart Airport:</label>
		<input type="text" name="depart_airport" value="<?php echo $depart_airport;?>" required>
		<br><br>
		<label>Arrive Airport:</label>
		<input type="text" name="arrive_airport" value="<?php echo $arrive_airport;?>" required>
		<br><br>
		<label>Depart Date & Time:</label>
		<input type="text"  name="depart_datetime" value="<?php echo $depart_datetime;?>" placeholder="dd/mm/yy hh:mm am/pm" required>
		<br><br>
		<label>Gate Number:</label>
		<input type="text" name="gate_no" value="<?php echo $gate_no;?>" required>
		<br><br>
		<label>Estimate Duration:</label>
		<input type="text" name="est_duration" value="<?php echo $est_duration;?>" required>
		<br><br>
		<label>Check In Baggage Counter:</label>
		<input type="text" name="CheckinBaggage_counter" value="<?php echo $CheckinBaggage_counter;?>" required>
		<br><br>
		<label>Availability:</label>
		<input type="text" onfocus="this.value='available'" value="<?php echo $availability;?>" name="availability" required> 
		<br><br>
		<label>Team ID:</label>
		<input type="text" name="team_id" value="<?php echo $ticket_price;?>" required>
		<br><br>
		<label>Ticket Price:</label>
		<input type="text" name="ticket_price" value="<?php echo $team_id;?>" required>
		<br><br>
		<input type="submit" name="save" value="Add" class="btn btn-primary">
		<a href="flight_schedule.php" class="btn btn-default">Cancel</a> 
	</form><br><br>
<?php
}
}

//if manager ID is invalid, show an error message and allow staff to retype 
else {
?>
<form style="text-align:center" method="post" action="process_schedule.php">
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
<h2>Add Flight Schedule Record</h2>
</div>
<p>Please enter a new record.</p>
<p>Please enter the correct manager ID and manager password.</p><br>

<?php
	echo "<p align=center style='color:red'>Manager ID is not valid!</p><br>";
?>
<form  action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI']));?>" method="post">
		<label>Manager ID:</label>
		<input type="text" name="manager_id" required>
		<br><br>
		<label>Manager Password:</label>
		<input type="password" name="manager_password" required>
		<br><br>
        <label>Schedule ID:</label>
		<input type="text" name="Schedule_ID" value="<?php echo $Schedule_ID;?>" required>
		<br><br>
		<label>Depart Airport:</label>
		<input type="text" name="depart_airport" value="<?php echo $depart_airport;?>" required>
		<br><br>
		<label>Arrive Airport:</label>
		<input type="text" name="arrive_airport" value="<?php echo $arrive_airport;?>" required>
		<br><br>
		<label>Depart Date & Time:</label>
		<input type="text"  name="depart_datetime" value="<?php echo $depart_datetime;?>" placeholder="dd/mm/yy hh:mm am/pm" required>
		<br><br>
		<label>Gate Number:</label>
		<input type="text" name="gate_no" value="<?php echo $gate_no;?>" required>
		<br><br>
		<label>Estimate Duration:</label>
		<input type="text" name="est_duration" value="<?php echo $est_duration;?>" required>
		<br><br>
		<label>Check In Baggage Counter:</label>
		<input type="text" name="CheckinBaggage_counter" value="<?php echo $CheckinBaggage_counter;?>" required>
		<br><br>
		<label>Availability:</label>
		<input type="text" onfocus="this.value='available'" value="<?php echo $availability;?>" name="availability" required> 
		<br><br>
		<label>Team ID:</label>
		<input type="text" name="team_id" value="<?php echo $ticket_price;?>" required>
		<br><br>
		<label>Ticket Price:</label>
		<input type="text" name="ticket_price" value="<?php echo $team_id;?>" required>
		<br><br>
		<input type="submit" name="save" value="Add" class="btn btn-primary">
		<a href="flight_schedule.php" class="btn btn-default">Cancel</a> 
	</form><br><br>
<?php
}
} 
?>
</body>
</html>


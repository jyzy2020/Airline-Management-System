<!DOCTYPE html>

<!-- HTML form for staff to add new schedule -->


<html lang="en">
<head>
<meta charset="UTF-8">
<title>New Flight Schedule Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
.wrapper{
width: 500px;
margin: 0 auto;
}

label {
	width: 185px;
	display: inline-block;
	margin-right: 1px;
	margin-bottom: 5px;
}

</style>
</head>
<body>
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

<!-- Input form for new schedule  -->
<form  action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI']));?>" method="post">
        <label>Manager ID:</label>
		<input type="text" name="manager_id" required>
		<br><br>
		<label>Manager Password:</label>
		<input type="password" name="manager_password" required>
		<br><br>
		<label>Schedule ID:</label>
		<input type="text" name="Schedule_ID" required>
		<br><br>
		<label>Depart Airport:</label>
		<input type="text" name="depart_airport" required>
		<br><br>
		<label>Arrive Airport:</label>
		<input type="text" name="arrive_airport" required>
		<br><br>
		<label>Depart Date & Time:</label>
		<input type="text"  name="depart_datetime" placeholder="dd/mm/yy hh:mm am/pm" required>
		<br><br>
		<label>Gate Number:</label>
		<input type="text" name="gate_no" required>
		<br><br>
		<label>Estimate Duration:</label>
		<input type="text" name="est_duration" required>
		<br><br>
		<label>Check In Baggage Counter:</label>
		<input type="text" name="CheckinBaggage_counter" required>
		<br><br>
		<label>Availability:</label>
		<input type="text" onfocus="this.value='available'" name="availability" required> 
		<br><br>
		<label>Team ID:</label>
		<input type="text" name="team_id" required>
		<br><br>
		<label>Ticket Price:</label>
		<input type="text" name="ticket_price" required>
		<br><br>
		<input type="submit" name="save" value="Add" class="btn btn-primary">
		
		<!-- Back button -->
		<a href="flight_schedule.php" class="btn btn-default">Cancel</a> 
	</form><br><br>
  </body>
</html>
<!DOCTYPE html>

<!-- HTML form for staff to add new team -->

<html lang="en">
<head>
<meta charset="UTF-8">
<title>New Flight Team</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
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
</head>
<body>

<form style="text-align:center" method="post" action="process_team.php">
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
<h2>Add Flight Team</h2>
</div>
<p>Please enter a new record.</p>
<p>Please enter the correct manager ID and manager password.</p><br>

<!-- Input form for new team  -->
<form  action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI']));?>" method="post">
		<label>Manager ID:</label>
		<input type="text" name="manager_id" required>
		<br><br>
		<label>Manager Password:</label>
		<input type="password" name="manager_password" required>
		<br><br>
		<label>Team ID:</label>
		<input type="text" name="Team_ID" required>
		<br><br>
		<label>Pilot:</label>
		<input type="text" name="Pilot" required>
		<br><br>
		<label>Co-Pilot:</label>
		<input type="text" name="Co_Pilot" required>
		<br><br>
		<label>Flight Attendant 1: </label>
		<input type="text"  name="Flight_Attendant_1" required>
		<br><br>
		<label>Flight Attendant 2:</label>
		<input type="text" name="Flight_Attendant_2" required>
		<br><br>
		<label>Flight Attendant 3:</label>
		<input type="text" name="Flight_Attendant_3" required>
		<br><br>
		<label>Flight Attendant 4:</label>
		<input type="text" name="Flight_Attendant_4" required>
		<br><br>
		<label>Flight Attendant 5:</label>
		<input type="text" name="Flight_Attendant_5" required> 
		<br><br>
		<input type="submit" name="save" value="Add" class="btn btn-primary">
		<!-- Back button -->
		<a href="flight_schedule.php" class="btn btn-default">Cancel</a> 
	</form><br><br>
  </body>
</html>
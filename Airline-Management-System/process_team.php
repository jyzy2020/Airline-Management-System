
<!-- Server page to add a new team into database -->

<html lang="en">
<head>
<meta charset="UTF-8">
<title>New Flight Team</title>
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
	 $teamid=$_POST['Team_ID'];
	 $pilot=$_POST['Pilot'];
	 $copilot=$_POST['Co_Pilot'];
	 $attendant1=$_POST['Flight_Attendant_1'];
	 $attendant2=$_POST['Flight_Attendant_2'];
	 $attendant3=$_POST['Flight_Attendant_3'];
	 $attendant4=$_POST['Flight_Attendant_4'];
	 $attendant5=$_POST['Flight_Attendant_5'];

$idsearch = "SELECT Manager_ID FROM manager WHERE Manager_ID = '$manID'";
$result1=mysqli_query($conn, $idsearch);

//if else to check the validity of manager ID
if(mysqli_num_rows($result1)>0) {

$passsearch = "SELECT Password FROM manager WHERE Password = '$manPass'";
$result2=mysqli_query($conn, $passsearch);

//if else to check the validity of manager Password
if(mysqli_num_rows($result2)>0) {

	 //if both ID and Password are correct, save the record in database
	 $sql = "INSERT INTO flight_team (Team_ID,Pilot,Co_Pilot,Flight_Attendant_1,
	 Flight_Attendant_2, Flight_Attendant_3, Flight_Attendant_4, Flight_Attendant_5)
	 VALUES ('$teamid', '$pilot', '$copilot', '$attendant1', '$attendant2', '$attendant3'
	 , '$attendant4', '$attendant5')";
	 
	 //Message shown if team is added, a back button is also provided
	 if (mysqli_query($conn, $sql)) {
		echo "<div class='box'>";
		echo "<div style='text-align:center;font-size:30px'><b>  New Team Added! </b></div><br><br>";

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
else {
//if manager password is invalid, show an error message and allow staff to retype
?>
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
		<label>Team ID:</label>
		<input type="text" name="Team_ID" value="<?php echo $teamid;?>" required>
		<br><br>
		<label>Pilot:</label>
		<input type="text" name="Pilot" value="<?php echo $pilot;?>" required>
		<br><br>
		<label>Co-Pilot:</label>
		<input type="text" name="Co_Pilot" value="<?php echo $copilot;?>" required>
		<br><br>
		<label>Flight Attendant 1: </label>
		<input type="text" name="Flight_Attendant_1" value="<?php echo $attendant1;?>" required>
		<br><br>
		<label>Flight Attendant 2:</label>
		<input type="text" name="Flight_Attendant_2" value="<?php echo $attendant2;?>" required>
		<br><br>
		<label>Flight Attendant 3:</label>
		<input type="text" name="Flight_Attendant_3" value="<?php echo $attendant3;?>" required>
		<br><br>
		<label>Flight Attendant 4:</label>
		<input type="text" name="Flight_Attendant_4" value="<?php echo $attendant4;?>" required>
		<br><br>
		<label>Flight Attendant 5:</label>
		<input type="text" name="Flight_Attendant_5" value="<?php echo $attendant5;?>" required> 
		<br><br>
		<input type="submit" name="save" value="Add" class="btn btn-primary">
		<a href="flight_schedule.php" class="btn btn-default">Cancel</a> 
	</form><br><br>
<?php
}
}
else {
//if manager ID is invalid, show an error message and allow staff to retype
?>
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
		<label>Team ID:</label>
		<input type="text" name="Team_ID" value="<?php echo $teamid;?>" required>
		<br><br>
		<label>Pilot:</label>
		<input type="text" name="Pilot" value="<?php echo $pilot;?>" required>
		<br><br>
		<label>Co-Pilot:</label>
		<input type="text" name="Co_Pilot" value="<?php echo $copilot;?>" required>
		<br><br>
		<label>Flight Attendant 1: </label>
		<input type="text" name="Flight_Attendant_1" value="<?php echo $attendant1;?>" required>
		<br><br>
		<label>Flight Attendant 2:</label>
		<input type="text" name="Flight_Attendant_2" value="<?php echo $attendant2;?>" required>
		<br><br>
		<label>Flight Attendant 3:</label>
		<input type="text" name="Flight_Attendant_3" value="<?php echo $attendant3;?>" required>
		<br><br>
		<label>Flight Attendant 4:</label>
		<input type="text" name="Flight_Attendant_4" value="<?php echo $attendant4;?>" required>
		<br><br>
		<label>Flight Attendant 5:</label>
		<input type="text" name="Flight_Attendant_5" value="<?php echo $attendant5;?>" required> 
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


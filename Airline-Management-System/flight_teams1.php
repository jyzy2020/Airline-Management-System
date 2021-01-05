
<!-- Update particular team from database-->

<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Flight Teams Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
.wrapper{
width: 500px;
margin: 0 auto;
}

	.box{
	max-width:100%;
	padding:30px;
	border:1px solid black;
	margin: auto;
	}
</style>
</head>
<body>

<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">

<h2>Update Flight Teams Record</h2>
</div>
<p>Please edit the input values and submit to update the record.</p>

<p>Please input management id and password to update!</p><br>

<?php
$conn= mysqli_connect("localhost", "root", "", "sample2 (1)");
// Check connection
if ($conn->connect_error) {
die("Connection failed:" . $conn->connect_error);
}
if(count($_POST)>0) {
$manID = $_POST ['manager_id'];
$manPass = $_POST ['manager_password'];

$idsearch = "SELECT Manager_ID FROM manager WHERE Manager_ID = '$manID'";
$result1=mysqli_query($conn, $idsearch);

//if else to check the validity of manager ID
if(mysqli_num_rows($result1)>0) {

$passsearch = "SELECT Password FROM manager WHERE Password = '$manPass'";
$result2=mysqli_query($conn, $passsearch);

//if else to check the validity of manager Password
if(mysqli_num_rows($result2)>0) {

//if manager ID and password are valid, updated input will be updated in database
mysqli_query($conn,"UPDATE flight_team set Team_ID='" . $_POST['Team_ID'] . "',
 Pilot='" . $_POST['Pilot'] . "', Co_Pilot='" . $_POST['Co_Pilot'] . "',
 Flight_Attendant_1='" . $_POST['Flight_Attendant_1'] . "',
 Flight_Attendant_2='" . $_POST['Flight_Attendant_2'] . "',
 Flight_Attendant_3='" . $_POST['Flight_Attendant_3'] . "', 
 Flight_Attendant_4='" . $_POST['Flight_Attendant_4'] . "', 
 Flight_Attendant_5='" . $_POST['Flight_Attendant_5'] . "'WHERE Team_ID='".$_POST['Team_ID']."'");
 
 //message is shown if team record is updated succesfully in database
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

/* Data that are queried from the database about a particular team will be
shown in a table, for staff to update */
$query = "SELECT Team_ID, Pilot, Co_Pilot, Flight_Attendant_1,
Flight_Attendant_2, Flight_Attendant_3, Flight_Attendant_4, Flight_Attendant_5 
FROM flight_team WHERE Team_ID='".$_GET['teamid']."'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0) {
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
<label>Team ID</label>
<input type="text" name="Team_ID" class="form-control" value="<?php echo $row["Team_ID"];?>">
</div>
<div class="form-group">
<label>Pilot</label>
<input type="text" name="Pilot" class="form-control" value="<?php echo $row["Pilot"];?>">
</div>
<div class="form-group">
<label>Co-Pilot</label>
<input type="text" name="Co_Pilot" class="form-control" value="<?php echo $row["Co_Pilot"];?>">
</div>
<div class="form-group">
<label>Flight Attendant 1</label>
<input type="text" name="Flight_Attendant_1" class="form-control" value="<?php echo $row["Flight_Attendant_1"];?>">
</div>
<div class="form-group">
<label>Flight Attendant 2</label>
<input type="text" name="Flight_Attendant_2" class="form-control" value="<?php echo $row["Flight_Attendant_2"];?>">
</div>
<div class="form-group">
<label>Flight Attendant 3</label>
<input type="text" name="Flight_Attendant_3" class="form-control" value="<?php echo $row["Flight_Attendant_3"];?>">
</div>
<div class="form-group">
<label>Flight Attendant 4</label>
<input type="text" name="Flight_Attendant_4" class="form-control" value="<?php echo $row["Flight_Attendant_4"];?>">
</div>
<div class="form-group">
<label>Flight Attendant 5</label>
<input type="text" name="Flight_Attendant_5" class="form-control" value="<?php echo $row["Flight_Attendant_5"];?>">
</div>
<input type="hidden" name="Team_ID" value="<?php echo $row["Team_ID"]; ?>"/>
<input type="submit" class="btn btn-primary" value="Submit">
<!-- Back button -->
<a href="flight_schedule.php" class="btn btn-default">Cancel</a>
</form>

</div>
</div>        
</div>
</div>
<?php
}
else {  
		//if team record is not found, show an error message
		echo "<div class='box'>";
		echo "<div style='text-align:center;font-size:30px'><b>  No teams found, go create one! </b></div><br><br>";
?>

<div style="text-align:center">
<!-- Button for staff to add a team -->
<a href="flight_team_add.php" style="font-size:18px; margin-right:30px;">Add a team!</a>
<!-- Button for staff to go back to the schedule home page -->
<a href="flight_schedule.php" style="font-size:18px">Back to record</a>
</div>
</div>
<?php
}
?>
</body>
</html>
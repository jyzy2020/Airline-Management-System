
<!-- PHP codes to delete desired schedule from database -->

<html>
<head>
<style>
	a {
	text-decoration: none;
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

<?php
	session_start ();
	$conn=mysqli_connect("localhost", "admin", null, "sample2 (1)");
	
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

	// session's data is saved in a variable
	$scheduleid = $_SESSION ['scheduleid'];
	
	//delete schedule from database
	$query="delete from flight_schedule where Schedule_ID='$scheduleid'";
	$result=mysqli_query($conn, $query);
	
	?>
<div class='box'>
<!-- Message shown for deleted schedule -->
<div style='text-align:center;font-size:30px'><b>Schedule <?php echo $scheduleid;?>
 deleted! </b> <br><br>

<!-- Button for staff to go back to schedule home page -->
<a href="flight_schedule.php" style="font-size:25px">Back</a>
</div>
</div>
	<?php
	}
	
//if manager password is invalid, show an error message and allow staff to retype
else {
?>
<div class='box'>
<div style='text-align:center;font-size:30px'><b>Are you sure you want to delete 
Schedule <?php echo $_SESSION ['scheduleid'] ; ?>?</b> <br>

 <p align=center style='font-size:15px;color:red'>Manager Password is not valid!</p>

<form  action="delete_schedule.php" method="post">
		<label style="font-size:20px">Manager ID:</label>
		<input type="text" name="manager_id" required>
		<br><br>
		<label style="font-size:20px">Manager Password:</label>
		<input type="password" name="manager_password" required> <br><br>
		<!-- No button, it will lead staff back to the record -->
		<a href="flight_schedule.php" style="font-size:25px;margin-right:40px;">No</a>

		<!-- Yes button, it will delete the particular script -->
		<input type="submit" value="Yes" style="font-size:25px;background-color:white;border:none;" >
</form>

</div>
</div>
<?php
}
}
else{
?>
<div class='box'>
<div style='text-align:center;font-size:30px'><b>Are you sure you want to delete 
Schedule <?php echo $_SESSION ['scheduleid'] ; ?>?</b> <br>

 <p align=center style='font-size:15px;color:red'>Manager ID is not valid!</p>

<form  action="delete_schedule.php" method="post">
		<label style="font-size:20px">Manager ID:</label>
		<input type="text" name="manager_id" required>
		<br><br>
		<label style="font-size:20px">Manager Password:</label>
		<input type="password" name="manager_password" required> <br><br>
		<!-- No button, it will lead staff back to the record -->
		<a href="flight_schedule.php" style="font-size:25px;margin-right:40px;">No</a>

		<!-- Yes button, it will delete the particular script -->
		<input type="submit" value="Yes" style="font-size:25px;background-color:white;border:none;" >
</form>

</div>
</div>
<?php
}
?>
</body>
</html>

<!-- HTML page to ask if staff is confirmed to delete a particular schedule -->

<html>
<head>
<style>
	.box{
	max-width:100%;
	padding:30px;
	border:1px solid black;
	margin: auto;
	}
	
	a {
	text-decoration: none;
	}
</style>
</head>
<body>
<?php
	
	/* Session started and the particular schedule ID that is desired to be
	deleted is stored in a session */
	session_start ();
	$_SESSION ['scheduleid'] = $_GET ['userid'];
?>
<div class='box'>
<div style='text-align:center;font-size:30px'><b>Are you sure you want to delete 
Schedule <?php echo $_SESSION ['scheduleid'] ; ?>?</b> <br><br>

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
		
</body>

</html>
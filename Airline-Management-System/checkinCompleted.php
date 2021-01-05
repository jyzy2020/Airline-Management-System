
<!-- PHP codes to change the check in status from database -->

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
	$conn=mysqli_connect("localhost", "admin", null, "sample2 (1)");

	// selected ticket ID is stored in a variable
	$ticketid = $_GET ['ticketid'];
	
	//update the status of the particular ticket to checked-in
	mysqli_query($conn,"UPDATE flight_tickets set Status = 'checked-in' WHERE Ticket_ID='$ticketid'" );
	?>
<div class='box'>

<!-- Message shown for check in completion -->
<div style='text-align:center;font-size:30px'><b>Check in completed, Have a safe flight! </b> <br><br>

<!-- Button for staff to go back to purchased ticket home page -->
<a href="purchasedtickets.php" style="font-size:25px">Back</a>
</div>
</div>
</body>
</html>
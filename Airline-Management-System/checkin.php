<!DOCTYPE html>

<!-- Check in page that shows all the ticket details -->

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Check In</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
.bs-example{
margin: 20px 20px 0 0;
}

.box{
	max-width:100%;
	padding:30px;
	border:1px solid black;
	margin: auto;
}

</style>
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>
</head>
<body>
<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">
<div class="box">

<?php

//store the selected schedule id and ticket id in two variables
$scheduleid = $_GET ['scheduleid'];
$ticketid = $_GET ['ticketid'];

$conn = mysqli_connect("localhost", "root", "", "sample2 (1)");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Display the selected data from flight tickets
$result2 = mysqli_query($conn,"SELECT * FROM flight_tickets WHERE Ticket_ID='$ticketid'");
if (mysqli_num_rows($result2) > 0) {
echo "<p align=center style='font-size:30px'><b>Check in Details:</b></p><br>";
while($row=mysqli_fetch_array($result2)) { 
	echo "<b>Ticket ID:  </b>".$row['Ticket_ID']."<br><br>";
	echo "<b>Name:  </b>".$row['Full_name']."<br><br>";
	echo "<b>IC number:  </b>".$row['IC_number']."<br><br>";
    echo "<b>Class:  </b>".$row['Class']."<br><br>";
	echo "<b>Seat Number:  </b>".$row['Seat_No']."<br><br>";
}
}

//Display the selected data from flight schedule
$result = mysqli_query($conn,"SELECT * FROM flight_schedule WHERE Schedule_ID='$scheduleid'");
if (mysqli_num_rows($result) > 0) {
while($row=mysqli_fetch_array($result)) { 
	echo "<b>Depart airport:  </b>".$row['depart_airport']."<br><br>";
	echo "<b>Arrive airport:  </b>".$row['arrive_airport']."<br><br>";
	echo "<b>Depart date and time:  </b>".$row['depart_datetime']."<br><br>";
    echo "<b>Gate number:  </b>".$row['gate_no']."<br><br>";
	echo "<b>Est duration:  </b>".$row['est_duration']."<br><br>";
	echo "<b>Check in baggage counter:  </b>".$row['CheckinBaggage_counter']."<br><br>";
}
}

?>
<br>
<!-- Confirm check in Button -->
<a href="checkinCompleted.php?ticketid=<?php echo $ticketid;?>" style="text-decoration:none; color:white;position:absolute;right:50px;bottom:20;
text-align: center;padding: 15px 32px;background-color: #e32526;">Check In Now</a>

<!-- Back button -->
<a href="purchasedtickets.php" style="text-decoration:none; color:white;position:absolute;bottom:20;text-align:center;padding: 15px 32px;background-color: #e32526;">BACK</a>
<br>
</table><br>
</div>
</div>        
</div>
</div>
</div>
</div>
</body>
</html>
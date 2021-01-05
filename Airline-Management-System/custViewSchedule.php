<!DOCTYPE html>

<!-- View schedule for customers that wants to check in -->

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Schedule details</title>
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

//store the selected schedule ID in a variable
$scheduleid = $_GET["scheduleid"];
$conn = mysqli_connect("localhost", "root", "", "sample2 (1)");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//query all data from flight schedule that matches the selected schedule id
$result = mysqli_query($conn,"SELECT * FROM flight_schedule WHERE Schedule_ID='$scheduleid'");
?>
<?php

//Display all the data
if (mysqli_num_rows($result) > 0) {
echo "<p align=center style='font-size:30px'><b>Schedule Details:</b></p><br>";
while($row=mysqli_fetch_array($result)) { 
	echo "<b>Depart airport:  </b>".$row['depart_airport']."<br><br>";
	echo "<b>Arrive airport:  </b>".$row['arrive_airport']."<br><br>";
	echo "<b>Depart date and time:  </b>".$row['depart_datetime']."<br><br>";
    echo "<b>Gate number:  </b>".$row['gate_no']."<br><br>";
	echo "<b>Est duration:  </b>".$row['est_duration']."<br><br>";
	echo "<b>Check in baggage counter:  </b>".$row['CheckinBaggage_counter']."<br><br>";
}
?>
</table><br>

<!-- Back button -->
<div style="text-align:center">  
<a href="purchasedtickets.php" style="font-size:18px">Back</a>
</div>
<?php
}
else {
//If the schedule ID is not in the database, display error message
echo "<div style='text-align:center;font-size:30px'><b>  No results found! </b></div><br><br>";
?>
<div style="text-align:center">  
<a href="purchasedtickets.php" style="font-size:18px">Back</a>
</div>
<?php
}
?>
</div>
</div>        
</div>
</div>
</div>
</div>
</body>
</html>
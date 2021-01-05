<!DOCTYPE html>

<!-- Search result for schedule -->

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Boarding Management</title>
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

</div>
<?php

//store the selected schedule ID in a variable
$scheduleid = $_POST["scheduleid"];

$conn = mysqli_connect("localhost", "root", "", "sample2 (1)");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
else {
//query all data from flight_tickets that matches the selected schedule ID
$result = mysqli_query($conn,"SELECT * FROM flight_tickets WHERE Schedule_ID='$scheduleid'");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<!-- Display the data in a table -->
<h2 style="text-align:center">Search Result</h2> <br>
<table class='table table-bordered table-striped'>
<tr>
<td>Schedule ID </td><td>
<td>Ticket ID</td><td>
<td>Class</td><td>
<td>Seat No</td><td>
<td>Passport ID</td><td>
<td>Status</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["Schedule_ID"]; ?> </td><td>
<td><?php echo $row["Ticket_ID"]; ?></td><td>
<td><?php echo $row["Class"]; ?></td><td>
<td><?php echo $row["Seat_No"]; ?></td><td>
<td><?php echo $row["Passport_ID"]; ?></td><td>
<td><?php echo $row["Status"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table><br>

<!-- Back button -->
<div style="text-align:center">  
<a href="boarding_management.php" style="font-size:18px">Back</a>
</div>
<?php
}
else{
//If the schedule ID is not in the database, display error message
echo "<div class='box'>";
echo "<div style='text-align:center;font-size:30px'><b>  No results found! </b></div><br><br>";
?>
<div style="text-align:center">  
<a href="boarding_management.php" style="font-size:18px">Back</a>
</div>
</div>
<?php
}
}
?>
</div>
</div>        
</div>
</div>
</body>
</html>
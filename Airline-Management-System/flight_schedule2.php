
<!-- View selected schedule from boarding management -->

<html>
<head>

<h2 align="center">Flight Schedule Records</h2>

<style>
table, th, td {
  border-collapse: collapse;
  border: 1px solid black;
  table-layout: fixed;
  width: 100%;  
} 

</style>

</head>
<body>
<?php
$con=mysqli_connect("localhost", "admin", null, "sample2 (1)");

//query all the data from flight_schedule that matches the schedule ID selected
$query="select * from flight_schedule where Schedule_ID ='".$_GET ["userid"]."'";
$result=mysqli_query($con, $query);
if(mysqli_num_rows($result)==0) {
  echo "<p>No record in the Schedule table.</p>"; }
else {
?>

<!-- Display all the data in a table -->
<table>
<tr>
<td>Schedule ID</td>
<td>Depart Airport</td>
<td>Arrive Airport</td>
<td>Depart Date & time</td>
<td>Gate Number</td>
<td>Estimate Duration</td>
<td>Check In Baggage Counter</td>
<td>Availability</td>
<td>Ticket Price</td>
<td>Team Id</td>
</tr>
<?php
  while($row=mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["Schedule_ID"]; ?></td>
<td><?php echo $row["depart_airport"]; ?></td>
<td><?php echo $row["arrive_airport"]; ?></td>
<td><?php echo $row["depart_datetime"]; ?></td>
<td><?php echo $row["gate_no"]; ?></td>
<td><?php echo $row["est_duration"]; ?></td>
<td><?php echo $row["CheckinBaggage_counter"]; ?></td>
<td><?php echo $row["availability"]; ?></td>
<td><?php echo $row["ticket_price"]; ?></td>
<td><?php echo $row["Team_ID"]; ?><br></td>
</tr>
</table> <br>

<!-- Back button -->
<div style="text-align:center">  
<a href="boarding_management.php" style="font-size:18px">Back</a>
</div>

<?php
}
}
?>

</body>
</html>
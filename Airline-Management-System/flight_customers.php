<!DOCTYPE html>

<!-- Search result for customer -->

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
<div class="box">

<?php

//store the selected passport ID in a variable
$customerid = $_POST["passportid"];
$conn = mysqli_connect("localhost", "root", "", "sample2 (1)");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//query all data from customer that matches the selected passport ID
$result = mysqli_query($conn,"SELECT * FROM customer WHERE Passport_ID='$customerid'");
?>
<?php

//Display all the data
if (mysqli_num_rows($result) > 0) {
echo "<p align=center style='font-size:30px'><b>Customer Details:</b></p><br>";
while($row=mysqli_fetch_array($result)) { 
	echo "<b>Passport ID:  </b>".$row['Passport_ID']."<br><br>";
	echo "<b>Customer Name:  </b>".$row['Cust_Name']."<br><br>";
	echo "<b>Nationality:  </b>".$row['nationality']."<br><br>";
    echo "<b>Contact Number:  </b>".$row['contact']."<br><br>";
	echo "<b>Email:  </b>".$row['email']."<br><br>";
	echo "<b>Address:  </b>".$row['address']."<br><br>";
	echo "<b>Relationship status:  </b>".$row['Relationship_status']."<br><br>";
	echo "<b>Age:  </b>".$row['Age']."<br><br>";
	echo "<b>Account Password:  </b>".$row['Password']."<br><br>";
	echo "<b>IC number:  </b>".$row['IC_number']."<br><br>";
}
?>
</table><br>

<!-- Back button -->
<div style="text-align:center">  
<a href="boarding_management.php" style="font-size:18px">Back</a>
</div>
<?php
}
else {
//If the passport ID is not in the database, display error message
echo "<div style='text-align:center;font-size:30px'><b>  No results found! </b></div><br><br>";
?>
<div style="text-align:center">  
<a href="boarding_management.php" style="font-size:18px">Back</a>
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
<html>
<body>
<style>
p2 {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 18px;
  color:white;
}
p3 {
  font-size:60px;color:darkred;
}
h2{
	border-style: solid;
	margin: auto;
	width: 100%;
  height: 450px;
  font-size: 15px;
}

.header {
  background: #e32526;
}

</style>
<div class="header">
<img src="AirAsia_logo.png" alt="Airasia Logo" width:"200" height="200">
</div >
<?php
// Session Start
session_start();
$passport=$_SESSION["Passport_ID"]; $date=$_SESSION["date"]; $ticketprice=$_SESSION["ticketprice"];$digit=$_SESSION['Digit'];

?>

<p2><b><?php

// Display Date
echo "Today's Date : ".$date;

?></b></p2>
<?xml version="1.0" ?>
<CustomerInfo>
<Passport></Passport>
<PaymentDate></PaymentDate>
<TicketPrice></TicketPrice>

</CustomerInfo>
<h1 style="font-size:40px;color:#e32526;"><center> Confirmation Page </center></h1>
<?php

$filename = 'customerspayment.xml';


// If customerspayment.xml is exist 
if (file_exists($filename)) {
$xdoc=new DomDocument();

// Load customerspayment.xml 
$xdoc->Load('customerspayment.xml');

// Get root
$Customerinfo=$xdoc->getElementsByTagName("CustomerInfo")->item(0);

// Create Level 1 Element 
$Customer=$xdoc->createElement('Customer');
$Customerinfo->appendChild($Customer);

// Create attribute for passport
$attr=$xdoc->createAttribute('Passport_ID');
$attr->value=$passport;
$Customer->appendChild($attr);


// Create Level 2 Element 
$ticketid=$xdoc->createElement('Ticket_ID');
$ticketid->appendChild($xdoc->createTextNode($digit));
$Customer->appendChild($ticketid);

// Create Level 3 Element 
$datetime=$xdoc->createElement('Purchased_Date');
$datetime->appendChild($xdoc->createTextNode($date));
$Customer->appendChild($datetime);

// Create Level 4 Element
$ticket=$xdoc->createElement('Ticket_Price');
$ticket->appendChild($xdoc->createTextNode($ticketprice));
$Customer->appendChild($ticket);

// Save all of the data to the customerspayment.xml
$xdoc->save("customerspayment.xml");

} else {
// If customerspayment.xml is doesn't exist 
$dom=new DomDocument();


$Customerinfo=$dom->createElement("CustomerInfo"); // Create a Root level
$dom->appendChild($Customerinfo);

$Customer=$dom->createElement('Customer'); // Create Level 1
$Customerinfo->appendChild($Customer);

$attr=$dom->createAttribute('Passport_ID');// Create Level 1 Attribute
$attr->value=$passport;
$Customer->appendChild($attr);

$ticketid=$dom->createElement('Ticket_ID');// Create Level 2 
$ticketid->appendChild($dom->createTextNode($digit));
$Customer->appendChild($ticketid);

$datetime=$dom->createElement('Purchased_Date');// Create Level 3
$datetime->appendChild($dom->createTextNode($date));
$Customer->appendChild($datetime);

$ticket=$dom->createElement('Ticket_Price');// Create Level 4
$ticket->appendChild($dom->createTextNode($ticketprice));
$Customer->appendChild($ticket);

// Save all of the data to the customerspayment.xml
$dom->save("customerspayment.xml");

    
}

	


// Calling data from the Session 
$id=$_SESSION['schedule_ID'];
$class=$_SESSION['Class'];
$seat=$_SESSION['Seat'];
$payment=$_SESSION['Payment'];
$ic=$_SESSION['IC'];
$name=$_SESSION['Name'];


// Connect to the Database
$conn = mysqli_connect("localhost","root","","sample2 (1)");
if($conn==false) echo " No database Connected. ";


// Insert all of the data from the Session into the Database which is the table of flight_ticket
$sql = "INSERT INTO flight_tickets (Ticket_ID,Purchase_Date,Schedule_ID,Class,Seat_No,Ticket_price,Payment_option,Passport_ID,IC_Number,Full_name)
VALUES ('$digit','$date','$id','$class','$seat','$ticketprice','$payment','$passport',
'$ic','$name')";


if (mysqli_query($conn, $sql)) {
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
}

// Connection of database closed
$conn->close();
?>
<h2><p3><center>Purchase Is Completed</center></p3>
<center><img src="done1.jpg" alt="Airasia Logo" width:"300" height="350"></center>
</a>
</h2>
<br>
<center>
<a href="Homepage.php"><button style="color: white;padding: 15px 32px;background-color: #e32526;">BACK TO THE HOMEPAGE</button>
</center>



</body></html>
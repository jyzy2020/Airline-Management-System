<?php

//start session
session_start();

$user_name = "root";
$password = "";
$database = "sample2 (1)";
$server = "localhost";
$con = mysqli_connect($server,$user_name,$password,$database);

$massage2 ='<span align:center style="color:red;text-align:center;">Passport idalready registered</span>';

    $Cust_Name=$_POST['name'];
	$Passport_ID =$_POST['passport'];
	$nationality=$_POST['nationality'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$Relationship_status=$_POST['status'];
	$Age=$_POST['age'];
	$IC_number=$_POST['ic_number'];
	$Password=$_POST['password'];
// To make sure the customer fill-up all the requests
if (!empty($Cust_Name) || !empty($Passport_ID) || !empty($nationality) || !empty($contact) || !empty($email) || !empty($address)|| !empty($Relationship_status)|| !empty($Age)|| !empty($IC_number)|| !empty($Password)){
$user_name = "root";
$password = "";
$database = "sample2 (1)";
$server = "localhost";
$con = mysqli_connect($server,$user_name,$password,$database);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
  	 $SELECT = "SELECT Passport_ID From customer Where Passport_ID = ? Limit 1";
     $INSERT = "INSERT Into customer (Cust_Name, Passport_ID , nationality, contact, email, address,Relationship_status,Age,Password,IC_number) values(?, ?, ?, ?, ?, ?,?, ?, ?, ?)";
//To make sure the passport ID is unique
     $stmt = $con->prepare($SELECT);
     $stmt->bind_param("s", $Passport_ID);
     $stmt->execute();
     $stmt->bind_result($Passport_ID);
	 $stmt->store_result();
     $stmt->store_result();
     $stmt->fetch();
     $rnum = $stmt->num_rows;

//Upload customer detail into the database
	 if ($rnum==0) {
      $stmt->close();
      $stmt = $con->prepare($INSERT);
      $stmt->bind_param("sssisssiss", $Cust_Name, $Passport_ID, $nationality, $contact, $email, $address,$Relationship_status,$Age,$Password,$IC_number);
      $stmt->execute();
	  header("Location: http://localhost/sign up2.php");
     } else {
      echo "";
     }
     $stmt->close();
     $con->close();
    }

  }
else {
 echo "All field are required";
 die();
 }
 
 
?>


<html>
<head>

<title>AirAisia Sign up</title>

<style>
body{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
    background-image: url('3416459.jpg');
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size: cover;
}

.loginbox{
	width: 350px;
	height: 750px;
	background: #000;
	color: #fff;
	top:50%;
	left:50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizng: border-box;
}

.login-box{
	width: 180px;
	position: absolute;
	top: -19%;
	left: 50%;
	transform: translate(-50%,25%);
	color: white;
}

.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid white;
}

.textbox input{
  border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
}

</style>  
</head>

<body>
<div clss="login-box">

<div class="loginbox">
<form action="sign up.php" method="post">

<body>
<div class="loginbox">

<div class="login-box">
<center>
  <h1>Sign up</h1>
  </center>

<!-- display out the error message when customer user are sign up are existed passport id-->
  <p><center><?php  echo $massage2;   ?></center></p>
  <div class="textbox">
  <input type ="text" placeholder="Enter Your Name" name="name" required>
  </div>

  <div class="textbox">
  <input type ="text" placeholder="Passport ID " name="passport" required>
  </div>
  
  <div class="textbox">
  <input type ="text" placeholder="Nationality " name="nationality"required>
  </div>
  
  <div class="textbox">
  <input type ="text" placeholder="Contact" name="contact"required>
  </div>
  
  <div class="textbox">
  <input type ="text" placeholder="Email " name="email"required>
  </div>
  
  <div class="textbox">
  <input type ="text" placeholder="Address " name="address"required>
  </div>
  
  <div class="textbox">
  <input type ="text" placeholder="Relationship status " name="status"required>
  </div>
  
  <div class="textbox">
  <input type ="text" placeholder="Age " name="age"required>
  </div>
  
  <div class="textbox">
  <input type ="password" placeholder="IC number " name="ic_number"required>
  </div>
  
  <div class="textbox">
  <input type ="password" placeholder="Password " name="password"required>
  </div>
  
  <div class="textbox i">
  <input type ="submit" name="submit" value="Sign Up"style="color:white">
  </div><br>
 <!--lead to the login page -->
     <center><a href="index.html" style="color:white">Back</a></center>
  
</div >

</div>
</table>



</form>


</body>
</html>


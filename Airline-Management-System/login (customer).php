
<!-- Log in program logic -->

<?php
//start session
session_start();
$user_name = "root";
$password = "";
$database = "sample2 (1)";
$server = "localhost";
$con = mysqli_connect($server,$user_name,$password,$database);



// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$error ='<span aglin:center style="color:red;text-align:center;">Plese Enter the correct detail </span>';

$type =$_POST["capital"];
$username = $_POST['username'];
$password = $_POST['password'];

//connect to the customer page
if ($type === "customer") {

	$query = "SELECT * FROM `customer` WHERE Passport_ID ='".$username."' AND Password='".$password."'limit 1";
	$result = mysqli_query($con, $query);
	
	if (mysqli_num_rows($result) ==1) {
	$row = $result->fetch_assoc();
	
	$_SESSION["Passport_ID"]=$row["Passport_ID"];
	$_SESSION["Cust_Name"]=$row["Cust_Name"];
	header("Location: http://localhost/Homepage.php");
	exit();
	
	
}
}
else{
   echo"";
   }
//connect to the staff page
	if ($type === "STAFF"){

	$query = "SELECT * FROM `staff` WHERE Staff_ID ='".$username."' AND Password='".$password."'limit 1";
	$result = mysqli_query($con, $query);
	
	if (mysqli_num_rows($result) == 1) {
	$row = $result->fetch_assoc();

	$_SESSION["Staff_name"]=$row["Staff_name"];
	header("Location: http://localhost/flight_schedule.php");
	exit();
  }
  }
  else {
  			echo " ";
		}
 
?>

<html>
<head>
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
	width: 450px;
	height: 450px;
	background: #000;
	color: #fff;
	top:50%;
	left:50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizng: border-box;
}
.login-box{
	
	position: absolute;
	top: 18%;
	left: 54%;
	transform: translate(-50%,50%);
	color: white;
}

.textbox{
  width: 80%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #4caf50;
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
btn{
  width: 100%;
  background: none;
  border: 2px solid #4caf50;
  color: white;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}
</style>

<title>AirAisia Login </title>

 
  
</head>

<body>
<div clss="login-box">

<form action="login (customer).php" method="post">


<div class="loginbox">

  <h1 style="margin-top:90px"><center>Welcome to Airaisa </center></h1>

<p><center>
<?php
//output the error massage
  echo $error;   
  
?></center></p>

<div class="login-box">
  <input type="radio" name="capital" value="customer"required>Customer
  <input type="radio" name="capital" value="STAFF"required>Staff<br>

  <div class="textbox">
  <input type ="text" placeholder="Passport ID" name="username"required>
  </div>

  <div class="textbox">
  <input type ="password" placeholder="Password" name="password"required>
  </div>
  
  <div class="textbox i">
  <input type ="submit" name="submit" value="Sign in">
  </div>
  </form>
  <a href="Signup.html" style="color:white">Need an account?</a>
  </div>
</table>


</body>
</html>
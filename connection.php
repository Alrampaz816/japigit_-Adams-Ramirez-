<?php
$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$email = $_POST['email'];

$valid = true;
$error = array();

if ($username == ""){
	$error[0] = "Enter a username.";
	$valid = false;
}
if (strlen($username) < 6){
	$error[1] = "Your username must be at least 6 characters long.";
	$valid = false;
}
if ($password == ""){
	$error[2] = "Please enter a password.";
	$valid = false;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$error[3] = "Invalid email format";
}
if ($valid == true){
	//make connection
	$con = mysqli_connect("localhost","root","","db3test");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
	//get info and put it in the database
	$sql = "INSERT INTO `members`(`username`, `password`, `fname`, `mname`, `lname`, `email`) 
		VALUES ('$username', '$password', '$fname', '$mname', '$lname', '$email')";

	if (mysqli_query($con, $sql)) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}

	mysqli_close($con);
}
else{
	foreach($error as $msg)
	{
		echo "$msg <br>";
	}
}

?>
<a href="pd4validation.html">Click Here to try again.</a>;
<a href="members.html">GO TO MEMBERS ONLY PAGE.</a>;
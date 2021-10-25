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
	$GoodLogin = false;
	$login = "SELECT * FROM members WHERE username = '$username' AND password = '$password'";
	$update = "UPDATE members SET fname = '$fname', mname = '$mname', lname = '$lname', email = '$email' WHERE username = '$username'";

	if (mysqli_query($con, $login)) {
		if(mysqli_num_rows(mysqli_query($con, $login)) > 0){
			$GoodLogin = true;
		}
	} else {
	  echo "Error: " . $login . "<br>" . mysqli_error($con);
	}
	
	//update the information
	if($GoodLogin == true){
		if(mysqli_query($con, $update)) {
			echo "Your profile has been updated.";
		} else {
			echo "Error: ". $update . "<br>" . mysqli_error($son);
		}
	} else {
		echo "The information you entered does not match our records.";
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
<br />
<br />
<a href="Registration_CREATE.html">Register as a new member</a>;
<br />
<a href="UPDATE.html">Try to update again</a>;
<br />
<a href="checkUser_READ.html">Search for your profile</a>;
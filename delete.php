<!DOCTYPE html>
<html>
	<head>
		<title>Become a not Member</title>
		<style type = "text/css">
		  body{background-color:Aquamarine; font-family:Arial; text-align:center;}
		  legend{font-weight:bold;}
		  label{padding-bottom:10px; width:100px;}
		  form{text-align:left; display:inline-block;}
		  fieldset{ margin:10px; padding:20px;}
		</style>
	</head>
	<body>



<?php

$username = $_POST['username'];
$password = $_POST['password'];

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
	$delete = "DELETE FROM members WHERE username = '$username'";

	if (mysqli_query($con, $login)) {
	  		if(mysqli_num_rows(mysqli_query($con, $login)) > 0){
				$GoodLogin = true;
			}
	} else {
	  echo "Error: " . $login . "<br>" . mysqli_error($con);
	}
	
	//update the information
	if($GoodLogin == true){
		if(mysqli_query($con, $delete)) {
			echo "Your membership has been deleted. We are sorry to see you go, but we will be here when you're ready to come back!";
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
		<a href="UPDATE.html">Update your member profile</a>;
		<br />
		<a href="checkUser_READ.html">Search for your member profile</a>;
		<br />
		<a href="DELETE.html">Delete Membership</a>;

	</body>
</html>
</html>
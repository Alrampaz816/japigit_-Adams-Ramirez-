<!DOCTYPE html>
<html>
	<head>
		<title>Are you a Member?</title>
		<style type = "text/css">
		  body{background-color:Aquamarine; font-family:Arial; text-align:center; font-size: 24pt;}
		  margin-top: 50px;
		  
		  table{
			  width: 500px; margin-top: 200px; text-align: center; background: White;
		  }
		  table, th, td {
			 font-size:24pt;
			 border: 2px solid Black; 
			 background-color: White;
			 border-collapse: collapse;
		  }
		  th, td{padding: 10px;}
		  th{
			 text-transform: uppercase;
			 letter-spacing: 0.lem;
			 font-size: 90%;
		  }
		  
		  
		</style>
	</head>
	<body>
	</body>
</html>	
		




<?php
//set variables
$username = $_GET['username'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];


//make connection
	$con = mysqli_connect("localhost","root","","db3test");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}
	else
	{
		//find username in database and display the username, first name and last name
		$sql = "SELECT username, fname, lname FROM members WHERE username = '$username' || fname = '$fname' || lname = '$lname'";
		$result = mysqli_query($con, $sql);
	}
	?>
		<br><br><br>
			<table align="center">
					<tr>
						<th colspan = "3"> Results Table</th>
					</tr>
					<tr>
						<th>Username</th>
						<th>First Name</th>
						<th>Last Name</th>
					</tr>		
		<?php
			while ($match = mysqli_fetch_assoc($result))
			{ ?>
				<tr>
					<td><?php echo $match['username']; ?></td>
					<td><?php echo $match['fname']; ?></td>
					<td><?php echo $match['lname']; ?></td>
				<tr>
		<?php
			}
		?>
	
				</table>
					<p> Didn't find your profile?</p>
					<br>
					<a href="checkUser_READ.html">Try different search</a>
					<br>
					<a href="Registration_CREATE.html">Register as a new member</a>
					<br>
			
		<?php ; 
	

	if (mysqli_query($con, $sql)) {
	  echo "Search complete!";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}

	mysqli_close($con);
	
?>


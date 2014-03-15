<?php
session_start();
// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}


//store the data in variables came from form input //
// sanitize data using preg_replace to avoid sql injection //

$adminusername = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST["adminusername"])); // filter everything but numbers and letters
 $adminpass = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST["adminpassword"])); // filter everything but numbers and letters

// encrypting password while using md5() function //
$adminpassword = sha1($adminpass);

//query database to reference username and password //
$query = mysqli_query($con, "SELECT * FROM admins where
			adminusername='$adminusername' AND
			adminpassword='$adminpassword' ") or die(mysqli_error());

$count = mysqli_num_rows($query);
if ($count == 1)
// $count checks if username and password are in same row //
{

	$_SESSION["authenticatedAdminUser"] = $adminusername;

	header("location: adminaccount.php");
	
} else {
	header("location: adminlogin.php");

	echo $_SESSION["nologin"] = "Could not log in as administrator $adminusername, Please try again"; 

}
?>
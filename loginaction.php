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
if (isset($_POST["username"], $_POST["password"])) {
	
$username = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"])); // filter everything but numbers and letters
$pass = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"])); // filter everything but numbers and letters
    
// encrypting password while using md5() function //
$password = sha1($pass);
//query database to reference username and password //
$query = mysqli_query($con, "SELECT * FROM users where
			username='$username' AND
			password='$password' ") or die(mysqli_error());

$count = mysqli_num_rows($query);
if ($count == 1)
// $count checks if username and password are in same row //
{

	$_SESSION["authenticatedUser"] = $username; 			
	header("location: useraccount.php");
	// header() function redirect user to members page //
} 
else {
	
	$_SESSION["nologin"] = "Could not log in as $username, Please try again";
	header("location: login.php"); 
}
}
?>
<?php

session_start();

/// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
$username = $_SESSION["authenticatedUser"];
$newusername = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST['newusername']));

$queryget = mysqli_query($con, "SELECT username FROM users WHERE username='$username'") or die(mysqli_error());


$updatequery = mysqli_query($con, "UPDATE users SET username='$newusername' WHERE username='$username'") or die(mysqli_error());	


if ($updatequery == TRUE ){
	session_destroy();
	session_start();
	$_SESSION["usernamechange"] = "Your username has been changed please login";
	header("location: login.php");
}

else {
	$_SESSION["nousernamechange"] = "Your username could not be changed, Please try again";
	header("location: changeusername.php");
}


mysqli_close($con);
?>
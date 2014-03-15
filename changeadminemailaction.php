<?php

session_start();

$username = $_SESSION["authenticatedAdminUser"];
$newemail =$_POST['newadminemail'];

/// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}


$queryget = mysqli_query($con, "SELECT adminemail FROM admins WHERE adminusername='$username'") or die(mysqli_error());


$updatequery = mysqli_query($con, "UPDATE admins SET adminemail='$newemail' WHERE adminusername='$username'") or die(mysqli_error());	


if ($updatequery == TRUE ){
	
	$_SESSION["adminnamechange"] = "Your email has been changed to $newemail";
	header("location: changeadminemail.php");
}

else {
	$_SESSION["noadminemailchange"] = "Your email could not be changed, Please try again";
	header("location: changeadminemail.php");
}


mysqli_close($con);
?>
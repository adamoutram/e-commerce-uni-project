<?php

session_start();




// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
$username = $_SESSION["authenticatedAdminUser"];
$currentpassword = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '',  sha1($_POST['currentpassword'])));
$newpassword = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', sha1($_POST['newpassword'])));
$confirmnewpassword = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', sha1($_POST['confirmnewpassword'])));

$queryget = mysqli_query($con, "SELECT adminpassword FROM admins WHERE adminusername='$username'") or die(mysqli_error());
$row = mysqli_fetch_assoc($queryget);

$currentpasswordDB = $row['adminpassword'];

//check passwords


if ($newpassword !== $confirmnewpassword) {
	header("location: passwordmismatch.php");
}

if ($currentpassword == $currentpasswordDB)
//success, change password in DB
{
	$updatequery = mysqli_query($con, "UPDATE admins SET adminpassword='$newpassword' WHERE adminusername='$username'") or die(mysqli_error());	
}

if ($updatequery == TRUE ){
	session_destroy();
	session_start();
	$_SESSION["passchange"] = "Your password has been changed please login";
	header("location: adminlogin.php");
}

else {
	header("location: passwordmismatch.php");
}


mysqli_close($con);
?>
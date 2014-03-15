<?php
session_start();
// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

/* store the values submitted by form in variable */
$adminusername = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST['adminusername']));
$adminpass = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST['adminpassword']));
$adminemail = $_POST['adminemail'];
/* encrypting password while using md5() function */
$password = sha1($adminpass);
$adminconfirm_password = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST['adminpasswordcomf']));

/* check if password and confirm password matched */
if ($adminpass != $adminconfirm_password) { header("Location: passwordmismatch.php");
}

/* check if username is already in use or not */
$queryuser = mysqli_query($con, "SELECT adminusername FROM admins WHERE adminusername='$adminusername' ") or die(mysqli_error());
$checkuser = mysqli_num_rows($queryuser);
if ($checkuser != 0) { header("location: usernamemismatch.php");
} else {

	/* write a query to insert user details into database */
	$insert_user = mysqli_query($con, "INSERT INTO admins (adminusername, adminpassword, adminemail) VALUES ('$adminusername', '$password', '$adminemail')") or die(mysqli_error());

}
if ($insert_user = mysqli_query) {
	$_SESSION["registeredAdminUser"] = $adminusername;

	header("Location: adminregistersuccess.php");
} else {
	$_SESSION["adminreg"] = "Please register an admin account";
	header("Location: createadmin.php");
}
?>
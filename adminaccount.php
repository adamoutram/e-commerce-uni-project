<?php
session_start();

// Check if we have an authenticated user
if (!isset($_SESSION["authenticatedAdminUser"]))
//if not re-direct to login page
{
$_SESSION["message"] = "Please Login";
header("Location: adminlogin.php");
}
else
{ 
//If authenticated then display page contents
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Specialist Cars</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="./main.css" />
		<img src="./images/banner.png" alt="banner" width="100%">
		</head>

		<body>
		<div id="header">
		<h1 style="margin-bottom:0; margin-top:0;">Badman Specialist Cars</h1>
		</div>

		<div id="menu">
			<ul>
				<br />
				<li>
					
					<div id="navigation">
						<a href="index.php">Home</a>
					</div>
				</li>
				<br />
					<hr>
				<br />	
				<li>
					<div id="navigation">
						<a href="products.php">Stock</a>
					</div>
				</li>
				<br />
					<hr>
				<br />
				<li>
					<div id="navigation">
						<a href="aboutus.php">About Us</a>
					</div>
				</li>
				<br />
					<hr>
				<br />
				<li>
					<div id="navigation">
						<a href="contact.php">Contact</a>
					</div>
				</li>
				<br />
					<hr>
				<br />
				<li>
					<div id="navigation">
						<a href="membership.php">Membership</a>
					</div>
				</li>
				<br />
					<hr>
				<br />
				<li>
					<div id="navigation">
						<a href="login.php">Login</a>
					</div>
				</li>
			</ul>
		</div>

		<div id="content">
			<br />
			<?php
				$HourOfDay = date("G");
				if ($HourOfDay < 12) {
					echo 'Good Morning!';
				} else {
					echo 'Good Afternoon';
				}
        ?>
			<h2>You are successfully logged on as ADMINISTRATOR <?php echo $_SESSION["authenticatedAdminUser"] ?></h2>
	<fieldset>
	<br />	
	<a href="manageproducts.php">Manage Products</a>  
    <br />
    <br />
    <a href="manageadminaccount.php">Manage Account</a>
    <br />
    <br />
    <a href="manageusers.php">Manage Users</a>
    <br />
    <br />
    <a href="createadmin.php">Create Administrator</a>
    <br />
    <br />
    <a href="userregistration.php">Create Users</a>
    <br />
    <br />
    <br />
    <a href="logout.php"><button>Logout</button></a>
    <br />
    </fieldset>
			
			
		<div id="footer">
			Made by Adam Outram, John Mackenzie, Phil Gilbert, Elliot Lewandowski
		</div>
		</div>
		</body>
</html>
<?php
}
?>
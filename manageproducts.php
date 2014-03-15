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
			
				<fieldset>
					<legend align="center">MANAGE PRODUCT DATABASE</legend>
					
					<p align="center">Choose an option</p><br />
				
					<a href="addproduct.php" style="float:center">Add product to database</a><br />
					<br />
					<a href="deleteproduct.php" style="float:center">Remove product from database</a><br />
					<br />
					<a href="modifyproduct.php" style="float:center">Modify product in database</a><br />
					<br />
					<br />
		</fieldset>	
		<br />	
		<a href="adminaccount.php"><button>Click here to go back to your account page</button></a>	
			
		<div id="footer">
			Made by Adam Outram, John Mackenzie, Phil Gilbert, Elliot Lewandowski
		</div>
</div>
		</body>
</html>
<?php
}
?>
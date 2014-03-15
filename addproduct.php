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
					<legend align="center">ADD PRODUCT TO DATABASE</legend>
<form method="post" action="addproductaction.php" align="center" name="addproductform" id="addproductform" enctype="multipart/form-data">

<p>Brand:</p><input name="brand" type="text" id="brand" required="required" />

<p>Model:</p><input name="model" type="text" id="model" required="required" />

<p>Year:</p><input name="year" type="number" id="year" required="required" />

<p>Engine:</p><input name="enginesize"type="text" id="enginesize" required="required" />

<p>Miles:</p><input name="milesclocked" type="number" id="milesclocked" required="required" />

<p>Price:</p><input name="price" type="number" id="price" required="required" />

<p>Image:</p><input name="imagelink" type="text" id="imagelink" required="required" />
<br />
<br />
<input type="submit" value="Submit" />
<input type="reset" value="Clear" />
</form>	
					
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
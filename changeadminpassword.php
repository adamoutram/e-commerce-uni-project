<?php
session_start();

// Check if authenticated user
//if not re-direct to login page
if (!isset($_SESSION["authenticatedAdminUser"]))
{
$_SESSION["message"] = "Please Login";
	header("Location: login.php");
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
			<form method="post" action="adminchangepasswordaction.php" name="adminchangepasswordform" id="adminchangepasswordform" enctype="multipart/form-data">
			<fieldset>
				<legend align="center">
					CHANGE PASSWORD
				</legend>
				<p align="center">
				
				
				<?php echo $_SESSION["nopasschange"]; ?>
				CURRENT PASSWORD: <input name="currentpassword" type="text"  id="currentpassword" required="required">
				<br />
				<br />
				NEW PASSWORD:	 <input name="newpassword" type="password"   id="newpassword" required="required">
				<br />
				<br />
				CONFIRM NEW PASSWORD:	 <input name="confirmnewpassword" type="password"   id="confirmnewpassword" required="required">
				<br />
				<br />
				
				
					<input type="submit" value="Submit" align="center" />
					<input type="reset" value="Clear" align="center" />

				</p>
				
			</fieldset>
		</form>
		
			
		<div id="footer">
			Made by Adam Outram, John Mackenzie, Phil Gilbert, Elliot Lewandowski
		</div>
		</div>
		</body>
</html>
<?php
}
?>
<?php
session_start();
if (isset($_SESSION["authenticatedUser"]))
{
	header("Location: useraccount.php");
	exit();
}
else if (isset($_SESSION["authenticatedAdminUser"]))
{
	header("Location: adminaccount.php");
	exit();
}
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
			<form method="POST" action="loginaction.php" name="login Form" id="loginform" enctype="multipart/form-data">
			<fieldset>
				<legend align="center">
					LOG IN
				</legend>
				<p align="center">
				<?php echo $_SESSION["cartlogin"] ?>	
				<?php echo $_SESSION["passchange"] ?>
				<?php echo $_SESSION["usernamechange"] ?>
				<?php echo $_SESSION["nologin"]; session_destroy();  ?>
				<br />
				<br />
				USERNAME: <input name="username" type="text"  id="username" required="required">
								
				PASSWORD: <input name="password" type="password" id="password" required="required">
								
				<br />
				<br />
					<input type="submit" value="Login" />
					<input type="reset" value="Clear" />
			
				</p>
			</fieldset>
		</form>
		<div style="float:right"><a href="adminlogin.php" >Administrator Login</a></div>
		
		<div style="float:left"><a href="userregistration.php" >Register</a></div>
		<br />
		<br />
	
		
			
		<div id="footer">
			Made by Adam Outram, John Mackenzie, Phil Gilbert, Elliot Lewandowski
		</div>
</div>	
		</body>
</html>
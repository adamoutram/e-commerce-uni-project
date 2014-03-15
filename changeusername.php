<?php
session_start();

// Check if authenticated user
//if not re-direct to login page
if (!isset($_SESSION["authenticatedUser"]))
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
			<form method="post" action="changeusernameaction.php" name="changeusernameform" id="changeusernameform" enctype="multipart/form-data">
			<fieldset>
				<legend align="center">
					CHANGE USERNAME
				</legend>
				<p align="center">
				
				<?php echo $_SESSION["usernamechange"] ?>
				<br />
				<br />
				Your current username is : <?php echo $_SESSION["authenticatedUser"] ?>
				<br />
				<br />
				 NEW USERNAME:	 <input name="newusername" type="text"   id="newusername" required="required">
				<br />
				<br />
				<script>
					function disp_confirm() {
						var r = confirm("Are you sure you want to change your username?")
						if (r == true) {
							alert("You pressed OK!")
						} else {
							alert("You pressed Cancel!")
						}
					}
						</script>
				
					<input type="submit" value="Submit" align="center" onclick="disp_confirm()" value="Display a confirm box"> 
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
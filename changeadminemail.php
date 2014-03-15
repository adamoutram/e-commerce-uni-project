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
<?php
// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
$adminUsername = $_SESSION["authenticatedAdminUser"];


//query the databse
		$query = "SELECT adminemail FROM admins WHERE adminusername='$adminUsername' " or die(mysqli_error());

		$result = mysqli_query($con, $query);
		
while($rows=mysqli_fetch_array($result)){
	
	
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
			<form method="post" action="changeadminemailaction.php" name="changeadminemailform" id="changeadminemailform" enctype="multipart/form-data">
			<fieldset>
				<legend align="center">
					CHANGE ADMIN EMAIL
				</legend>
				<p align="center">
				
				<?php echo $_SESSION["adminnamechange"] ?>
				<?php echo $_SESSION["noadminemailchange"] ?>
				<br />
				<br />
				Your current email is : <?php echo $rows['adminemail']; } ?>
				<br />
				<br />
				 NEW EMAIL:	 <input name="newadminemail" type="text"   id="newadminemail" required="required">
				<br />
				<br />
				
					<input type="submit" value="Submit" align="center" > 
					<input type="reset" value="Clear" align="center" /></form>
					
				</p>
			
			</fieldset>
		<a href="adminaccount.php"><button>Return to Account Page</button></a>
			
		<br />
		<div id="footer">
			Made by Adam Outram, John Mackenzie, Phil Gilbert, Elliot Lewandowski
		</div>
		</div>
		</body>
</html>
<?php
}
?>
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
				<br />
					<hr>
			</ul>
		</div>

		<div id="content">
			<br />
			<fieldset>
					<legend align="center">DELETE USERS</legend>
				<?php
				$product = $_POST["product"];
				
// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

$query = mysqli_query($con, "DELETE FROM products WHERE Product_ID='$product'") or die(mysqli_error());

if ($query == true){
	echo "the product $product has been deleted from the database";
}
else {
	echo "$product could not be deleted from the database";
}

mysqli_close($con);
?>
<br />
<br />
<a href="adminaccount.php"><button>Click here to go back to your account page</button></a>
		
		</fieldset>
		</legend>
			
			
		<div id="footer">
			Made by Adam Outram, John Mackenzie, Phil Gilbert, Elliot Lewandowski
		</div>
</div>
		</body>
</html>
<?php
}
?>
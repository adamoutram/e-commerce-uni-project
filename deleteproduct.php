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
			<form method="post" action="deleteproductaction.php" name="deleteproduct" id="deleteproduct">
				<fieldset>
					<legend align="center">DELETE PRODUCT</legend>
					
					<p>choose a PRODUCT to delete from the database:</p>
					<select name = 'product' id = 'product' >
					<?php
		// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

		//query the databse
		$query = "SELECT Product_ID, Brand, Model, Engine_Size FROM products" or die(mysqli_error());

		$result = mysqli_query($con, $query);
		
		while ($row = mysqli_fetch_array($result)) {
							echo("<option> " . $row['Product_ID'] ."\n". $row['Brand'] ."\n". $row['Model'] ."\n"."\n". $row['Engine_Size'] . " </option>");
		}
?>

					<input type="submit" value="Delete"/> 
					</select>
				</form>
<br />
<br />
<br />
<a href="manageproducts.php">Back to Manage Products</a>
<br />
<br />
<a href="adminaccount.php">Back to your Account page</a>
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
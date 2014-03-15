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
				<br />
					<hr>
				<br />
				<li>
					<div id="navigation">
						<a href="cart.php">Shopping Cart</a>
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
			<h2>You are successfully logged on as <?php echo $_SESSION["authenticatedUser"] ?></h2>
	<fieldset>
	<br />	
	<a href="userchangepassword.php">Change user password</a>  
    <br />
    <br />
    <a href="changeusername.php">Change user name</a>
    <br />
    <br />
    <a href="adduserdetails.php">Add personal details</a>
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
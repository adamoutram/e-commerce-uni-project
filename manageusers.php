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
			<form method="post" action="deleteuser.php" name="manageusers" id="manageusers" onsubmit="return confirm('Are you sure you want to submit?')">
				<fieldset>
					<legend align="center">MANAGE USERS</legend>
					
					<p>choose a USER to delete</p>
					<select name = 'users' id = 'users' >
					<?php
		// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

		//query the databse
		$query = "SELECT username, email, firstname, surname FROM users" or die(mysqli_error());

		$result = mysqli_query($con, $query);
		
		while ($row = mysqli_fetch_array($result)) {
							echo("<option> " . $row['username'] ."\n"."\n". $row['firstname'] ."\n". $row['surname'] ."\n"."\n". $row['email'] ." </option>");
		}
?>
</select>
					<input type="submit" value="Delete" />
					</form>
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
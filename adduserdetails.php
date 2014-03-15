<?php
session_start();

// Check if we have an authenticated user
if (!isset($_SESSION["authenticatedUser"]))
//if not re-direct to login page
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



$addressL1= mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST['addressL1']));
$addressL2= mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST['addressL2']));
$city= mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST['city']));
$postcode= mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST['postcode']));
$telephone= mysqli_real_escape_string($con, preg_replace('#[^A-Za-z0-9]#i', '', $_POST['telnumber']));
$username= $_SESSION["authenticatedUser"];

if (isset($_POST['addressL1'], $_POST['city'], $_POST['postcode'], $_POST['telnumber'] )) {
	
$query = mysqli_query($con, "UPDATE users SET addressline1='$addressL1', addressline2='$addressL2', city='$city', postcode='$postcode', telephoneno='$telephone' WHERE username ='$username'") or die(mysqli_error());	
	
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
		<fieldset>
					<legend align="center">ADD USER DETAILS</legend>
			<br />
		
		<form method="post" action="adduserdetails.php" name="addressform" id="addressform" enctype="multipart/form-data">
			<p align ="center">
			<tbody>	
		Address Line 1: <input name="addressL1" type="text"   id="addressL1" required="required" align="center"><br />
		Address Line 2: <input name="addressL2" type="text"   id="addressL2" required="required" align="center"><br />
		City: <input name="city" type="text"   id="city" required="required" align="center"><br />
		Postcode: <input name="postcode" type="text"   id="postcode" required="required" align="center"><br />
		Telephone: <input name="telnumber" type="tel"   id="telnumber" required="required" align="center"><br />
		<br />
		</tbody>
		
				<input type="submit" value="Submit" />
				<input type="reset" value="Clear" />
				</form>
		<br />
		</p>
		<?php
		if($query = mysqli_query){
			echo "Updated address: <br />";
			echo "$addressL1 <br />";
			echo "$addressL2 <br />";
			echo "$city <br />";
			echo "$postcode <br />";
			echo "$telephone";
			echo "<br />";
			echo "<a href='useraccount.php'><button>Back to Account</button></a>";
		}
		
			
		?>	
					
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
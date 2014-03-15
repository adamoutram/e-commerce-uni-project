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
					<legend align="center">MODIFY PRODUCT</legend>
					
					<p>choose a PRODUCT to modify</p>
					
					<?php
		// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

		//query the databse
		$query = "SELECT * FROM products" or die(mysqli_error());

		$result = mysqli_query($con, $query);
		
		?>
		<table width="400" border="0" cellspacing="1" cellpadding="0">
					<tr>
						<td>
						<table width="400" border="1" cellspacing="0" cellpadding="3">
							<tr>
								<td colspan="4"><strong>Products in Database </strong></td>
							</tr>

							<tr>
								<td align="center"><strong>ID</strong></td>
								<td align="center"><strong>Brand</strong></td>
								<td align="center"><strong>Model</strong></td>
								<td align="center"><strong>Year</strong></td>
								<td align="center"><strong>Engine Size</strong></td>
								<td align="center"><strong>Miles Clocked</strong></td>
								<td align="center"><strong>Price</strong></td>
								
								<td align="center"><strong>Update</strong></td>
							</tr>
<?php
while($rows=mysqli_fetch_array($result)){
?>

<tr>
<td><? echo $rows['Product_ID']; ?></td>
<td><? echo $rows['Brand']; ?></td>
<td><? echo $rows['Model']; ?></td>
<td><? echo $rows['Year']; ?></td>
<td><? echo $rows['Engine_Size']; ?></td>
<td><? echo $rows['Miles_Clocked']; ?></td>
<td><? echo "£" . $rows['Price']; ?></td>
<? $rows['image']; ?>

<!--link to update.php and send value of id -->
<td align="center"><a href="updateproduct.php?id=<? echo $rows['Product_ID']; ?>">update</a>
	
</td>
</tr>

 <?php
}
?>

</table>
</td>
</tr>
</table>
<br />
<a href="adminaccount.php"><button>Click here to go back to your account page</button></a>
<?php
mysqli_close($con);
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
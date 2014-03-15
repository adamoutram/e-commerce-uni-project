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
			
				<fieldset>
					<legend align="center">MODIFY PRODUCT</legend>
					
					<?php
		$brand = $_POST['brand'];
		$model = $_POST['model'];
		$year = $_POST['year'];
		$engine = $_POST['engine'];
		$miles = $_POST['miles'];
		$price = $_POST['price'];
		$image = $_POST['imagesrc'];	
		$product_id	= $_POST['product_id'];	
		
		// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

		//query the databse
		$query = ("UPDATE products SET Brand='$brand', Model='$model', Year='$year', Engine_Size='$engine', Miles_Clocked='$miles', Price='$price', image='$image' WHERE Product_ID = '$product_id'") or die(mysqli_error());

		$result = mysqli_query($con, $query);
		
		echo "<br /> <br />";
		if($result){
			echo "Successful";
			echo "<br />";
			echo "<br />";
			echo "Product Updated: $product_id, $brand, $model, $year, $engine, $miles, £ $price, $image";
			echo "<br />";
			echo "<br />";
			echo "<a href='products.php'><button>View Products</button></a>";
		}
		else{
			echo "ERROR, Could not update product";
			echo "<br />";
			echo "<a href='modifyproduct.php'><button>Try Again</button></a>";
		}
		?>
<br />	
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
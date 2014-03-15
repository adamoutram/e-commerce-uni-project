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


<?php
// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

$brand = $_POST['brand'];
$model = $_POST['model'];
$year = $_POST['year'];
$engine = $_POST['enginesize'];
$miles = $_POST['milesclocked'];
$price = $_POST['price'];
$image = $_POST['imagelink'];

/* write a query to insert user details into database */
	$insert_product = mysqli_query($con, "INSERT INTO products (Brand, Model, Year, Engine_Size, Miles_Clocked, Price, image ) VALUES ('$brand', '$model', '$year', '$engine', '$miles', '$price', '$image')")or die(mysqli_error()); 

if ($insert_product = TRUE) {
	 $addproductresult = "Product successfully added to database: $brand $model $engine $miles $price";
} else {
	$addproductresult ="add Product to database was unsucessful, please try again. ";
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
				<li>
					<div id="navigation">
						<a href="index.php">Home</a>
					</div>
				</li>
				<p>
					____________________
				</p>
				<li>
					<div id="navigation">
						<a href="products.php">Stock</a>
					</div>
				</li>
				<p>
					____________________
				</p>
				<li>
					<div id="navigation">
						<a href="aboutus.php">About Us</a>
					</div>
				</li>
				<p>
					____________________
				</p>
				<li>
					<div id="navigation">
						<a href="contact.php">Contact</a>
					</div>
				</li>
				<p>
					____________________
				</p>
				<li>
					<div id="navigation">
						<a href="membership.php">Membership</a>
					</div>
				</li>
				<p>
					____________________
				</p>
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
					<legend align="center">ADD PRODUCT TO DATABASE</legend>
					<br />
			<?php echo $addproductresult ?>
			<br />
			<br />
		
			<a href="adminaccount.php"><button>Back to your account</button></a>
			<br />
			<br />
			<a href="addproduct.php"><button>Add Another Product</button></a>
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
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
		// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
//get value of id 
$Product_ID = $_GET['id'];
//retreive data from database
$sqlquery="SELECT * FROM products WHERE Product_ID ='$Product_ID'";
$result=mysqli_query($con, $sqlquery);
$rows=mysqli_fetch_array($result);
?>


<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<form name="updateproduct" method="post" action="updateaction.php">
<td>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>&nbsp;</td>
<td colspan="3"><strong>Update Product in Database</strong> </td>
</tr>
<tr>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="center">&nbsp;</td>
<td align="center"><strong>Brand</strong></td>
<td align="center"><strong>Model</strong></td>
<td align="center"><strong>Year</strong></td>
<td align="center"><strong>Engine</strong></td>
<td align="center"><strong>Miles</strong></td>
<td align="center"><strong>Price</strong></td>
<td align="center"><strong>Image</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="center">	
<input name="brand" type="text" id="brand" value="<? echo $rows['Brand']; ?>" size="15">
</td>
<td>
<input name="model" type="text" id="model" value="<? echo $rows['Model']; ?>" size="15">
</td>
<td>
<input name="year" type="number" id="year" value="<? echo $rows['Year']; ?>" size="15">
</td>		
<td>
<input name="engine" type="text" id="engine" value="<? echo $rows['Engine_Size']; ?>" size="15">
</td>		
<td>
<input name="miles" type="number" id="miles" value="<? echo $rows['Miles_Clocked']; ?>" size="15">
</td>	
<td>
<input name="price" type="number" id="price" value="<? echo $rows['Price']; ?>" size="15">
</td>	
<td>
<input name="imagesrc" type="text" id="imagesrc" value="<? echo $rows['image']; ?>">
</td>	
</tr>
<tr>
<td>&nbsp;</td>
<td>
<input name="product_id" type="hidden" id="product_id" value="<? echo $rows['Product_ID']; ?>">
</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td align="center">
<input type="submit" name="Submit" value="Submit">
</td>

</tr>
</table>
</td>
</form>
</tr>
</table>

<?php
// close connection 
mysqli_close($con);
?>
<br />
<a href="adminaccount.php"><button>Click here to go back to your account page</button></a> &nbsp; <a href="manageproducts.php"><button>Back to Manage Products</button></a>
		
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
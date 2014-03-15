<?php
//script error reporting 
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Create connection
			$link = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($link)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			

//see if query is set / has value
if(isset($_POST['searchquery']) && $_POST['searchquery'] != ""){
	//santize data to stop datat injections
$searchquery = mysqli_real_escape_string($con, preg_replace('#[^A-Za-z 0-9.]#i', '', $_POST['searchquery']));

$sqlCommand = "SELECT * FROM products WHERE Brand LIKE '%$searchquery%' OR
Model LIKE '%$searchquery%' OR Engine_Size LIKE '%$searchquery%' OR Year LIKE '%$searchquery%' OR Price LIKE '%$searchquery%'";


//query database
$query= mysqli_query($link, $sqlCommand) or die(mysqli_error());
$count=mysqli_num_rows($query);
if($count > 1){
	$search_output = "<hr />$count results for <strong>$searchquery</strong><hr />";
	while($row = mysqli_fetch_array($query)){
		$id = $row["Product_ID"];
		$brand = $row["Brand"];
		$model = $row["Model"];
		$engine = $row["Engine_Size"];
		$button = '<a href="'.$row["Brand"].'products.php"><button>'.$row["Brand"].' Products</button</a>';
		
		$search_output .= '<tr>';
		$search_output .= '<td>'."$id".'</td>';
		$search_output .= '<td>'."$brand"."\n"."$model".'</td>';
		$search_output .= '<td>'."$engine".'</td>';
		$search_output .= '<td>'."$button".'</td>';
		$search_output .= '<tr>';
	}
} else {
	$search_output = "<hr />0 results for <strong>$searchquery</strong><hr />";
}
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
		<form action="searchdatabase.php" method="post">
				Search products: <input name="searchquery" type="text" size="60" maxlength="88">
				<input name="searchBtn" type="submit">
			</form>
		<br />
		<table width="100%" border="1" cellspacing="0" cellpadding="6">
			<tr>
				<td width="15%" bgcolor="#BFEFFF" style="font-weight: bold"> ID</td>
				<td width="35%" bgcolor="#BFEFFF" style="font-weight: bold"> Product</td>
				<td width="35%" bgcolor="#BFEFFF" style="font-weight: bold"> Description</td>
				<td width="15%" bgcolor="#BFEFFF" style="font-weight: bold"> Link</td>
			</tr>
		<?php echo $search_output ?>	
		
		<br />
		</table>
		
			
		<div id="footer">
			Made by Adam Outram, John Mackenzie, Phil Gilbert, Elliot Lewandowski
		</div>
		</div>

		</body>
</html>
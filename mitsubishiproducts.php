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

		<div id="menu" >
		
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
			<h2 align="center">Mitsubishi Products</h2>
			<form name="sort" action="mitsubishiproducts.php" method="post">
				<p align="center">sort by:
				<select name="order">
					<option value="Price">Price</option>
					<option value="Engine_Size">Engine Size</option>
					<option value="Year">Year</option>
					<option value="Miles_Clocked">Miles</option>
			
				</select>
				<input type="submit" value=" - Sort - " />		
			</form>
			</p>
			<br />
			<?php
		// Create connection
			$con = mysqli_connect("localhost", "root", "", "groupproject");

			// Check connection
			if (mysqli_connect_errno($con)) {
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		
		$sort = $_POST['order'];
		
		if (!empty($sort)) { // If you Sort it with value of your  select options
	 $query = "SELECT * FROM products WHERE Brand = 'Mitsubishi' ORDER BY ".$sort." DESC" or die(mysqli_error());

} else { // else if you do not pass any value from select option will return this
	    $query = "SELECT * FROM products WHERE Brand = 'Mitsubishi'" or die(mysqli_error());
}

		$result = mysqli_query($con, $query);
		
		echo "<table border='1', align = 'center', color = 'green';>

<tr>
<th>Product</th>
<th>Specification</th>

</tr>";

		//fetch results / convert results into an array
		while ($row = mysqli_fetch_array($result)) {
			echo "
			<tr>
				";

				echo "<td>" . $row["image"] ."</td>";

				echo "<td>" . $row["Brand"] ."\n". $row["Model"] . "
				<br />
				<br />
				" . $row["Year"] . "
				<br />
				<br />
				" . $row["Engine_Size"] .
				"
				<br />
				<br />
				Miles:" . $row["Miles_Clocked"] . "
				<br />
				<br />
				£" . $row["Price"] .'
				<form id="form1" name="form1" method ="post" action="cart.php">
					<input type="hidden"
					name="pid" id="pid" value="'.$row["Product_ID"].'"/>
					<input type="submit" name ="button" id="button" value="Add to Cart" />
				</form> '. "</td>";

				"
			</tr>";
			}

			echo "</table>";
			?>
		<br />

		<div id="footer">
			Made by Adam Outram, John Mackenzie, Phil Gilbert, Elliot Lewandowski
		</div>
</div>
	</body>
</html>
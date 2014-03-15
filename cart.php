<?php
session_start();

//script error reporting 
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Check if authenticated user
//if not re-direct to login page
if (!isset($_SESSION["authenticatedUser"]))
{
$_SESSION["cartlogin"] = "You must be logged into a user account to purchase products";
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
		
if (isset($_POST['pid'])){
	$pid=$_POST['pid'];
	$wasFound = false;
	$i = 0;
//if the cart session variable is not set or the cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1){
//	run if the cart is empty or not set
	$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
//run if the cart has atleast 1 item in it
	foreach($_SESSION["cart_array"] as $each_item){
		$i++;
		while (list($key, $value) = each($each_item)) {
			if($key == "item_id" && $value == $pid){
		//that item is already in cart so adjust quantity using array splice()
			array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item["quantity"] +1)));
			$wasFound = true;
	
		  }//close if
	   }//close while
	} //close foreach
	if ($wasFound == false){
		array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
	}

header("location:cart.php");
exit();
}
}

?>
<?php 
//if the user wants to empty shopping cart
if(isset($_GET['cmd']) && $_GET['cmd'] == "emptycart"){
	unset($_SESSION["cart_array"]);
}
?>

<!-- user chooses to adjust item quantity -->
<?php 
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
    // execute some code
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
	if ($quantity >= 100) { $quantity = 99; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  // That item is in cart already so  adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  } // close if condition
		    
		     } // close while loop
	    		     
	} // close foreach loop
	
	
}
?>

<!--if user wants to remove item from cart -->
<?php
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}
?>

<?php //render cart for user to view
$cartOutput = "";
$cartTotal ="";
$pp_checkout_btn ='';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h2 align='center' style='color:red'>Your shopping cart is empty, <a href='products.php'>Add Products</a></h2>";
} else{
	// Start PayPal Checkout Button
	$pp_checkout_btn .= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="sales@badmanspecialistcars.co.uk">';
	// Start the For Each loop
	$i=0;
	foreach($_SESSION["cart_array"] as $each_item){
	
	$item_id = $each_item['item_id'];
	$sql = mysqli_query($con, "SELECT * FROM products WHERE Product_ID='$item_id' LIMIT 1");
	while($row = mysqli_fetch_array($sql)){
		$product_brand=$row["Brand"];
		$product_model=$row["Model"];
		$price=$row["Price"];
		$year=$row["Year"];
		$miles=$row["Miles_Clocked"];
		$engine=$row["Engine_Size"];
		$product_image=$row["image"];
		$product_name= $product_brand ."\n". $product_model;
	}	
	$pricetotal = $price * $each_item["quantity"];
	$cartTotal = $pricetotal + $cartTotal;
	//dynamic checkout Btn assembley
	$x = $i + 1;
	$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
        <input type="hidden" name="amount_' . $x . '" value="' . $price . '">
        <input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';
	// Create the product array variable
	$product_id_array .= "$item_id-".$each_item['quantity'].","; 
	//dynamic row assembly
	$cartOutput .= '<tr>';
	$cartOutput .= '<td>' . $product_brand ."\n". $product_model . '<br />' . '</td>';
	$cartOutput .= '<td>' . $year ."\n". $engine ."\n". $miles . 'miles' . '</td>';
	$cartOutput .= '<td>' . '£' . $price . '</td>';
	$cartOutput .= '<td><form action="cart.php" method="post">
		<input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
		<input name="adjustBtn' . $item_id . '" type="submit" value="update" />
		<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
		</form></td>';
	$cartOutput .= '<td>' . '£' . $pricetotal . '</td>';
	$cartOutput .= '<td><form action="cart.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
	$cartOutput .= '</tr>';
	$i++;
	} 
	// Finish the Paypal Checkout Btn
	$pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '">
	<input type="hidden" name="notify_url" value="http://192.168.0.6:8080/localhost/a/my_ipn.php">
	<input type="hidden" name="return" value="http://localhost/a/checkoutcomplete.php">
	<input type="hidden" name="rm" value="2">
	<input type="hidden" name="cbt" value="Return to Badman Specialist Cars">
	<input type="hidden" name="cancel_return" value="http://localhost/a/paypalcancel.php">
	<input type="hidden" name="lc" value="US">
	<input type="hidden" name="currency_code" value="GBP">
	<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" name="submit" align="right" alt="Make payments with PayPal - its fast, free and secure!">
	</form>';
  }



?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title >Specialist Cars</title>
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
			<h2 align="center">Shopping Cart</h2>
		
		<table width="100%" border="1" cellspacing="0" cellpadding="6">
			<tr>
				<td width="18%" bgcolor="#BFEFFF" style="font-weight: bold"> Product</td>
				<td width="47%" bgcolor="#BFEFFF" style="font-weight: bold"> Description</td>
				<td width="10%" bgcolor="#BFEFFF" style="font-weight: bold"> Unit Price</td>
				<td width="9%" bgcolor="#BFEFFF" style="font-weight: bold"> Quantity</td>
				<td width="7%" bgcolor="#BFEFFF" style="font-weight: bold"> Total</td>
				<td width="9%" bgcolor="#BFEFFF" style="font-weight: bold"> Remove</td>
			</tr>
			
		<?php echo $cartOutput; ?>
	</table>		
				
				<p align="right">Cart Total : £ <?php echo $cartTotal ?></p>
				
				<a href="cart.php?cmd=emptycart"><button style="float: right;"> Empty Cart </button></a>		
				<br />
				<br />
				<?php echo $pp_checkout_btn ?><br />
				
				<br />
				<br />
				


		<div id="footer">
			Made by Adam Outram, John Mackenzie, Phil Gilbert, Elliot Lewandowski
		</div>
		</div>

	</body>
</html>
<?php
}
?>
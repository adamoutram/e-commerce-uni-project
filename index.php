<?php
session_start();
?>
<!DOCTYPE html>
<!--this document has also been edited and reuploaded to github-->
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
			<p>
				<big>Badman Specialist Cars</big> is one of the most respected 
				and well-connected specialist and prestige car dealers in the UK.
				 We have been involved in prestige car marqus for over 30 years and 
				 has built an enviable reputation for sourcing the very best prestige
				 and specialist cars and providing the ultimate expirience in VIP vehicle management.
			</p>

			<p>
				<big>Badman Specialist Cars</big> are your specialist car dealers, offering VIP vehicle management with
				a discreet one to one personal service. You can fully customise your car with
				designer interiors, state of the art multi-media and hi-fi options, custom paint finishes and exclusive alloy wheel options.
			</p>
			
			<div id="slideshow">
 <div> <img src="./images/ferrari.jpg"> </div>
 <div> <img src="./images/bugatti.jpg"> </div>
 <div> <img src="./images/lamborghini.jpg"> </div>
 </div>
<script src="./jquery.js"></script>
<script>
	$("#slideshow > div:gt(0)").hide();

	setInterval(function() {
		$('#slideshow > div:first').fadeOut(1000).next().fadeIn(1000).end().appendTo('#slideshow');
	}, 3000); 
</script> 	
<br />
<br />
<br />
<br />
			</div>
		

		<div id="footer">
			Made by Adam Outram, John Mackenzie, Phil Gilbert, Elliot Lewandowski
		</div>

		</body>
</html>
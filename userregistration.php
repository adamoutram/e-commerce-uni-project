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
			<form method="post" action="userregisteraction.php" name="register Form" id="registerform" enctype="multipart/form-data">
			<fieldset>
				<legend align="center">
					REGISTER
				</legend>
				<p align="center">
				
				<?php echo $_SESSION["messagereg"] ?>
				
				USERNAME: <input name="username" type="text"  id="username" required="required" align="right">
				EMAIL:	 <input name="email" type="email"   id="email" required="required">
				</p>
				</fieldset>
				<fieldset>
					<legend align="center">
						CREATE PASSWORD
						</legend>	
				<p align="center">		
					
				<?php echo $_SESSION["passwordmismatch"] ?>
				<?php echo $_SESSION["messagereg"] ?>
								
				PASSWORD: <input name="password" type="password" id="password" maxlength="20" required="required">
				CONFIRM PASSWORD : <input name="passwordconf" type="password" id="passwordconf" maxlength="20" required="required">
				</p>
				</fieldset>
				<fieldset>
				<legend align="center"> PERSONAL DETAILS</legend>	
				<p align="center">
				FIRSTNAME: <input name="firstname" type="text" id="firstname" required="required">
				SURNAME: <input name="surname" type="text" id="surname" required="required">
				Date of Birth: <input type="date" name="bday" id="bday" required="required">
				<br />
				<br />
				
					<input type="submit" value="Submit" />
					<input type="reset" value="Clear" />

				</p>
				
			</fieldset>
			
			
		</form>
		
		
			
		<div id="footer">
			Made by Adam Outram, John Mackenzie, Phil Gilbert, Elliot Lewandowski
		</div>
		</div>	

		</body>
</html>
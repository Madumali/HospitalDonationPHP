<?php 

require_once('../../header2.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hospital Donation MAnagement System</title>
	
	<link rel="stylesheet" href="../../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../../assets/css/menu.css">  <!-- main css -->
	<link rel="stylesheet" href="../../fontawesome/css/all.css">   <!-- fontawesome css -->
	<script src="../../assets/js/jquery-1.12.0.min.js" type="text/javascript"></script>
	<script src="../../assets/js/bootstrap.js"></script>
	

	 <!--css style sheet-->
</head>
<body class="wrapper2">
<div class="bg">
	<div class="login" id = "log">

		
			<!-- <table >
				<tr><td>
					 
						

				</td>
				</tr>
			</table> hospital name table-->

			
			
			<form  method="post" id = "login-form" class="form-login">
			<div id = "error" ></div>
			
			<fieldset>
				<legend><h1> Log In </h1></legend>
				
				<p class="log">
					<label>User name :</label>
					<input type="text" name="username" placeholder="Enter Your Username" id = "uname" >
					<span id="check_name"></span>
				</p>

				
				<p class="log">
					<label>Password :</label>
					<input type="password" name="password" placeholder="Enter Your password" id = "pass" >
					<span id="check_pass"></span>
				</p>

				
				<p>
					<button type="submit" name="submit" id ="loginbtn">Sign In</button>
				</p>

				
				</fieldset>	
					
</form> <!--login form-->
	



			
	</div> <!--login-->
	</div>
	
</body>
</html>

<script src="../../assets/js/login.js"></script>
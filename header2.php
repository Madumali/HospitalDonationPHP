

<?php 
session_start();
require_once('model/DBController.php');
require_once('model/Login/LoginCheck.php');
require_once('footer.php');

// if(!isset($_SESSION['userId']))

// {
// 	header("Location:/HospitalDonation/view/loginSystem/userlog.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- jquery libraries -->
	
	
</head>

	<header>
		 

	<table class="topbar clearfix">
		
		<tr>	<td>
					<div class="left_logo">
					<img src="../../assets/img/emblem.png">
					</div> <!-- emblem -->
				</td>
				<td> 
					<div class="midlogo">
					<img src="../../assets/img/hdms logo5.png">
					</div> <!-- midlogo -->
				</td>
				<td> 	
					<div class="right_logo">
			 		<img src="../../assets/img/nciNew2.png" >
					</div> <!-- right_logo--> 

				</td>
				</tr>
			</table>


		<hr></hr>

		
		
	
</header>

</html>

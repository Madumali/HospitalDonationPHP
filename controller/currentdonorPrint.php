<?php 
session_start();
require_once('model/DBController.php');


$uname="";
if(isset($_SESSION['username'])){
	$uname = $_SESSION['username'];
}
?>

<html lang="en">
<head>
<link rel="stylesheet" href="http://localhost/HospitalDonation/assets/css/menu.css" media="all">  <!-- main css -->
</head>

	<table class="topbar">
		<tr><td><div class="left_logop">
					<img src="http://localhost/HospitalDonation/assets/img/emblem copy.jpg">
					</div> <!-- emblem -->
				</td>
				<td><div class="midlogos">
					<!-- <img src="../../assets/img/hdms logo.png"> -->
                    <p>APEKSHA HOSPITAL <br>
                    Maharagama <br>
                    SriLanka <br>
                  	Phone:- 0112 xxx xxx. Fax:- xxxxxxxxxx  <br>
                    Email:- apeksha@gmail.com  <br>
                    Web:- www.nci.lk</p>
					</div> <!-- midlogo --></td><td> 	
					<div class="right_logop">
			 		<img src="http://localhost/HospitalDonation/assets/img/nciNew copy.jpg" >
					</div> <!-- right_logo--> </td></tr></table>
					<hr id = "pdf">
					
					<body>
<p>Entered By:-  <?php echo $_SESSION['username'] ?></p></body></html>

<?php 
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "db_hospital";
$conn =mysqli_connect($host, $user, $password, $dbname);

$uname = $_SESSION['username'];
// require_once('../model/DBController.php');
// require_once('../model/Login/LoginCheck.php');
$html = '

<html lang="en">
<head>
<style>
 .{
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    font-size: 14px;     
    }
    .topbar{

        width: 100%;
        
        padding: 5px;
        
        padding-bottom: -0px;
        
        }
    .left_logop img{
        margin-left: 20px;
        height: 80px;
       
        padding-bottom:10px;
        margin-bottom: -10px;
        margin-top: 5px;
        
    }
    .midlogos p{
       
        margin-left:150px;
        height: 80px;
        margin-right: 20px;
        padding-bottom: 10px;
        margin-bottom: 40px;
        margin-top: -5px;
        padding-top=0px;
    }
    .right_logop img {
	
        height: 80px;
        width: 200px;
        
        padding-right: 25px;
        padding-bottom:10px;
        margin-bottom: -10px;
        margin-left: 35px;
        margin-top: 5px;
        
        }
        hr#pdf {
            width: 99.9%;
            height:3px;
             background : lightblue;
        border-top: 1px solid lightblue;
        border-bottom: 1px solid lightblue;
        margin-top: -2px;
        
        }
</style>
</head>

<header>	<table class="topbar clearfix">
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
                    </header>
					<br><br><br><br><br><br><br><br><br><br>
					<body>
<p>Entered By:- '.$uname.' </p>
</body></html>';

//$letter = file_get_contents('http://localhost/HospitalDonation/controller/currentdonorPrint.php');

require('vendor/autoload.php');

// reference the Dompdf namespace
use Dompdf\Dompdf;


if(isset($_POST['print'])){
$dname = $_POST['donname '];
// echo $dname;
}

// instantiate and use the dompdf class
$dompdf = new Dompdf(array('enable_remote' => true));
$dompdf->loadHtml($html);


// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();
//$dompdf->set_base_path('http://localhost/HospitalDonation/assets/css/menu.css');
// Output the generated PDF to Browser
$dompdf->stream('Donor.pdf', array("Attachment"=>0));
// $dompdf->set_option('enable_html5_parser', TRUE);

?>




<?php 
session_start();
require_once('../model/DBController.php');
require_once('../model/Donor/TempDonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();


//IF RESERVATION BUTTON CLICKED IN DONOR TEAM TABLE
  //ajax value to submit button
if(isset($_POST['submitR'])){
		//ajax data passed
	if(isset($_POST['teamName']) && isset($_POST['idr']) && isset($_POST['memberName']) && isset($_POST['nic']) && isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['contact']) && isset($_POST['email'])) {

		if(!empty($_POST['teamName']) && !empty($_POST['idr'])) {			

			$teamName = $_POST['teamName'];
			$id = $_POST['idr'];
			$memberName = $_POST['memberName'];
			$nic = $_POST['nic'];
			$address1 = $_POST['address1'];
			$address2 = $_POST['address2'];
		 	$contact = $_POST['contact'];
			$email = $_POST['email'];
	
//pass values through arrays inside array
			$newarray=array();
			for($cnt = 0; $cnt<count($memberName);$cnt++)
			{

				$donType = "team";
				$teamName=mysqli_real_escape_string($con,$_POST['teamName']);
				$memberNameArr = mysqli_real_escape_string($con,($memberName[$cnt]));
				$nicArr = mysqli_real_escape_string($con,($nic[$cnt]));
				$address1Arr = mysqli_real_escape_string($con,($address1[$cnt]));
				$address2Arr = mysqli_real_escape_string($con,($address2[$cnt]));
				$contactArr = mysqli_real_escape_string($con,($contact[$cnt]));
				$contactArr2 = "";
				$emailArr = mysqli_real_escape_string($con,($email[$cnt]));
				$regDate = date('Y-m-d H:i:s');
				$status = '0';
				$newarray[]="('$donType','$teamName','$memberNameArr','$nicArr','$address1Arr','$address2Arr','$contactArr','$contactArr2','$emailArr','$regDate','$status')";
				
			}	
			
				$team = new TempDonorAdd();
				$result = $team -> addTempDonor($newarray);
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
				Data Added Successfully!
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			  </div>";
				
			} 
		
					
				
		}     else {
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
								Please Enter Details!
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							  </div>";
					}
	

 				
					}

?>

				
				 <!-- class = "memberName" contenteditable = "true" -->




					<!-- // FETCH DATA----TEAM RESERVATION -->
<!--  -->
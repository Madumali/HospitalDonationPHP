<?php 
session_start();
require_once('../model/DBController.php');
require_once('../model/Donor/TempDonorAdd.php');


$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();


 if(isset($_POST['submitR1'])){  //ajax value to submit button
		// if (empty($_POST['donorRName'])) {
		// 	echo "<script>alert('Please Enter Person details')</script>";
		
		//ajax data passed
	if(isset($_POST['donorRName']) && isset($_POST['donorRNic']) && isset($_POST['addressLine1R']) && isset($_POST['addressLine2R']) && isset($_POST['donorRMobile']) && isset($_POST['donorRMobile2']) && isset($_POST['donorREmail'])) {

		if(!empty($_POST['donorRName'])) {

		$myarrayR = array();			
			$donTypeR = "PERSON";
			$donorName = $_POST['donorRName'];
			$memberName = "";
			$donorNic = $_POST['donorRNic'];
			$addressL1 = $_POST['addressLine1R'];
			$addressL2 = $_POST['addressLine2R'];
		 	$contact1 = $_POST['donorRMobile'];
		 	$contact2 = $_POST['donorRMobile2'];
			$email = $_POST['donorREmail'];
			$regDate = date('Y-m-d H:i:s');
			$status = '0';
	

			$myarrayR[]="('$donTypeR','$donorName','$memberName','$donorNic','$addressL1','$addressL2','$contact1','$contact2','$email','$regDate','$status')";
//pass values through arrays inside array
				$personR = new TempDonorAdd();
				$resultR = $personR -> addTempDonor($myarrayR);
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
				Data Added Successfully!
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			  </div>";


} else {
echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
				Please Enter Details!
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			  </div>";
			} 
		}		

	}


	
				
				
							?>
			

	 
		
				
				

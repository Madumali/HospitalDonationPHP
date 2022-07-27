<?php 
session_start();
require_once('../model/DBController.php');
require_once('../model/Donor/TempDonorAdd.php');
require_once('../model/Donor/DonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();

// $action = "";
// if (!empty($GET["action"])){
// 	$action = $GET["action"];
// }
	//IF DONATION BUTTON CLICKED IN DONOR PERSON TABLE
// 

		
if(isset($_POST['submitD1'])){  //ajax value to submit button
	
		//ajax data passed
		if(isset($_POST['title']) && isset($_POST['donorName']) && isset($_POST['donorNic']) && isset($_POST['addressLine1']) && isset($_POST['addressLine2']) && isset($_POST['donorMobile']) && isset($_POST['donorMobile2']) && isset($_POST['donorEmail'])) {

		if(!empty($_POST['donorName'])) {

		$myarray = array();	
		$id="";		
			$donType1 = "Person";
			$title = $_POST['title'];
			$donorName = $_POST['donorName'];
		
			$donorNic = $_POST['donorNic'];
			$addressL1 = $_POST['addressLine1'];
			$addressL2 = $_POST['addressLine2'];
		 	$contact1 = $_POST['donorMobile'];
		 	$contact2 = $_POST['donorMobile2'];
			$email = $_POST['donorEmail'];
			$regDate = date('Y-m-d H:i:s');
			
			$status = '0';
			

			$myarray[]="('$id','$donType1','$title','$donorNic','$donorName','$addressL1','$addressL2','$email','$contact1','$contact2','$regDate','$status')";
//pass values through arrays inside array
				$person = new DonorAdd();
				$result1 = $person -> addDonor($myarray);
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

		
			
	
// UPDATE
	 
if(isset($_POST['update1'])){  //ajax value to submit button
	
	//ajax data passed
if(isset($_POST['edit_id']) && isset($_POST['eddonorName']) && isset($_POST['eddonorNic']) && isset($_POST['edaddressLine1']) && isset($_POST['edaddressLine2']) && isset($_POST['eddonorMobile']) && isset($_POST['eddonorMobile2']) && isset($_POST['eddonorEmail'])) {

	if(!empty($_POST['eddonorName']) && !empty($_POST['edit_id'])) {

	//$myarrayU= array();
	$data['edid'] =$_POST['edit_id'];			
	// $donType1 = "PERSON";
		$data['donorName'] = $_POST['eddonorName'];
		$data['donorNic'] = $_POST['eddonorNic'];
		$data['addressL1'] = $_POST['edaddressLine1'];
		$data['addressL2'] = $_POST['edaddressLine2'];
		$data['contact1'] = $_POST['eddonorMobile'];
	    $data['contact2'] = $_POST['eddonorMobile2'];
		$data['email'] = $_POST['eddonorEmail'];
		

		
//pass values through arrays inside array
			$personU = new DonorAdd();
			$resultU = $personU -> updateDonor($data);
			echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
			Record successfully updated
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		  </div>";

		} else {
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					Failed to update
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				  </div>";
		} 
				
	}
	
} 			





if(isset($_POST['update3P'])){
	if(isset($_POST['edit_id']) && isset($_POST['eddonorName']) && isset($_POST['eddonorNic']) && isset($_POST['edaddressLine1']) && isset($_POST['edaddressLine2']) && isset($_POST['eddonorMobile']) && isset($_POST['eddonorMobile2']) && isset($_POST['eddonorEmail'])) {

		if(!empty($_POST['eddonorName']) && !empty($_POST['edit_id'])) {
	
		//$myarrayU= array();
					
			$data['edid'] =$_POST['edit_id'];
			$data['donorName'] = $_POST['eddonorName'];
			$data['donorNic'] = $_POST['eddonorNic'];
			$data['addressL1'] = $_POST['edaddressLine1'];
			$data['addressL2'] = $_POST['edaddressLine2'];
			$data['contact1'] = $_POST['eddonorMobile'];
			$data['contact2'] = $_POST['eddonorMobile2'];
			$data['email'] = $_POST['eddonorEmail'];
			
	
		
	//pass values through arrays inside array
				$personU = new DonorAdd();
				$resultU = $personU ->updateDonor($data);
			
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
				Record successfully updated
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			  </div>";
	
			} else {
				echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						Failed to update
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					  </div>";
				
			} 
					
		}

} 			



 ?>




		
 		
			
		 
		

 

<?php 
session_start();
require_once('../model/DBController.php');
//require_once('../model/Donor/TempDonorAdd.php');
require_once('../model/Donor/DonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();
$sql='';


if(isset($_POST['submitD'])){  //ajax value to submit button
	
		//ajax data passed
if(isset($_POST['title']) && isset($_POST['donTeamName'])  && isset($_POST['donAddress']) && isset($_POST['donTContact']) && isset($_POST['donTEmail']) && isset($_POST['id']) && isset($_POST['donMemberName']) && isset($_POST['donNic']) && isset($_POST['donAddress1']) && isset($_POST['donAddress2']) && isset($_POST['donContact']) && isset($_POST['donEmail'])) {

		if(!empty($_POST['donTeamName']) && !empty($_POST['id']) && !empty($_POST['donMemberName'])) {	

			$newarray2 =array();
			$title = $_POST['title'];
			// $uniqid = $_POST['uniqId'];
			$teamName1 = $_POST['donTeamName'];
			$teamaddress = $_POST['donAddress'];
			$teamcontact = $_POST['donTContact'];
			$teamemail = $_POST['donTEmail'];
			$id1 = $_POST['id'];
			$memberName1 = $_POST['donMemberName'];
			$nic1 = $_POST['donNic'];
			$address1a = $_POST['donAddress1'];
			$address2a = $_POST['donAddress2'];
		 	$contact1 = $_POST['donContact'];
			$email1 = $_POST['donEmail'];
			$donType1 = "team";
			$title2 = "T/C";
			$regDate1 = date('Y-m-d H:i:s');
			$status1 = '0';
//pass values through arrays inside array
			$newarrayD=array();
			$sql1 = 'INSERT INTO `donor_all`( `donor_type`, `title`,  `donor_name`, `address_line1`, `email`, `contact_no`,  `reg_date`, `delete_status`) VALUES
("'.$donType1.'","'.$title2.'","'.$teamName1.'", "'.$teamaddress.'","'.$teamemail.'","'.$teamcontact.'","'.$regDate1.'","'.$status1.'");';
$queryU = mysqli_query($con,$sql1);	
// var_dump($queryU);
if($queryU){
    
	$last_id = mysqli_insert_id($con);
	
	if($last_id)
	{
		$code = "T00";
	
		$typecode = $code.$last_id;
		$query = "UPDATE donor_all SET `national_id` = '".$typecode."' WHERE donor_id = '".$last_id."'";
		$result = mysqli_query($con, $query);
		var_dump($result);
	}

			
			for($count = 0; $count<count($memberName1);$count++)
			{
				$id="";
				// $teamName1 = $_POST['donTeamName'];
				$titlearray = mysqli_real_escape_string($con,($title[$count]));
				$memberNameArr1 = mysqli_real_escape_string($con,($memberName1[$count]));
				$nicArr1 = mysqli_real_escape_string($con,($nic1[$count]));
				$address1Arr1 = mysqli_real_escape_string($con,($address1a[$count]));
				$address2Arr1 = mysqli_real_escape_string($con,($address2a[$count]));
				$contactArr1 = mysqli_real_escape_string($con,($contact1[$count]));
				$contactArr2 = "";
				$emailArr1 = mysqli_real_escape_string($con,($email1[$count]));
				$regDate1 = date('Y-m-d H:i:s');
				$status1 = '0';
				
				$sql .= 'INSERT INTO `donor_team`( `donor_name`, `title`, `membername`, `national_idt`, `address_line1t`, `address_line2t`, `contact_not`, `emailt`, `reg_datet`, `deletestatus`) VALUES ("'.$last_id.'","'.$titlearray.'","'.$memberNameArr1.'","'.$nicArr1.'","'.$address1Arr1.'","'.$address2Arr1.'","'.$contactArr1.'","'.$emailArr1.'","'.$regDate1.'","'.$status1.'");';
			}
// var_dump($sql);
	
			if($sql!='')
			{
			
			
				if(mysqli_multi_query($con,$sql))
				{
					
					echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
				Record successfully Inserted
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			  </div>";
				}
				 else {
					echo "error";
				}
				
			}	

		}
			
// $team1 = new DonorAdd();
				// $result1 = $team1 -> addDonorTeam($newarray2,$newarrayD);
				// var_dump ($result1);
			
			}

			}else {
				echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
								Please Enter Details!
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							  </div>";
					} 
			
			}






			if(isset($_POST['update2'])){  //ajax value to submit button
	
				//ajax data passed
			if(isset($_POST['edit_idT']) && isset($_POST['edteamNameT']) && isset($_POST['eddonorNameT']) && isset($_POST['eddonorNicT']) && isset($_POST['edaddressLine1T']) && isset($_POST['edaddressLine2T']) && isset($_POST['eddonorMobileT'])  && isset($_POST['eddonorEmailT'])) {
			
				if(!empty($_POST['eddonorNameT']) && !empty($_POST['edit_idT'])) {
			
				//$myarrayU= array();
				$data['edid'] =$_POST['edit_idT'];
				$data['teamName'] = $_POST['edteamNameT'];			
				
					$data['donorName'] = $_POST['eddonorNameT'];
					$data['donorNic'] = $_POST['eddonorNicT'];
					$data['addressL1'] = $_POST['edaddressLine1T'];
					$data['addressL2'] = $_POST['edaddressLine2T'];
					$data['contact1'] = $_POST['eddonorMobileT'];
					// $data['contact2'] = $_POST['eddonorMobile2T'];
					$data['email'] = $_POST['eddonorEmailT'];
				
			
			//pass values through arrays inside array
						$personUT = new DonorAdd();
						$resultUT = $personUT -> updateDonorTeam($data);
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



//UPDATE DONOR LIST

				
			


			
			if(isset($_POST['update3'])){  //ajax value to submit button
	
				//ajax data passed
			if(isset($_POST['edit_idT']) && isset($_POST['edteamNameT']) && isset($_POST['edaddressLine1T']) && isset($_POST['eddonorMobileT']) && isset($_POST['eddonorEmailT'])) {
			
				if(!empty($_POST['edit_idT'])) {
					


					//$myarrayU= array();
					$data['edid'] =$_POST['edit_idT'];
					$data['teamName'] = $_POST['edteamNameT'];			
					
					// $data['donorName'] = $_POST['eddonorNameT'];
					// $data['donorNic'] = $_POST['eddonorNicT'];
					$data['addressL1'] = $_POST['edaddressLine1T'];
					// $data['addressL2'] = $_POST['edaddressLine2T'];
					$data['contact1'] = $_POST['eddonorMobileT'];
					// $data['contact2'] = $_POST['eddonorMobile2T'];
					$data['email'] = $_POST['eddonorEmailT'];
					//$typedata = $_POST['edit_typeT'];
					
						$personUT = new DonorAdd();   //TEAM UPDATE
						$resultUT = $personUT -> updateDonorTeamDetail($data);
			
						echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
						Record successfully updated
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					  </div>";
			
			//pass values through arrays inside array
						
			
					} else {
						echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
								Failed to update
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							  </div>";
					} 
							
				}

			} 			
			
			

			
				

				 ?>





	
<!-- $dataP['edid'] =$_POST['edit_id'];			
					// $donType1 = "PERSON";
						$dataP['donorName'] = $_POST['eddonorName'];
						$dataP['donorNic'] = $_POST['eddonorNic'];
						$dataP['addressL1'] = $_POST['edaddressLine1'];
						$dataP['addressL2'] = $_POST['edaddressLine2'];
						$dataP['contact1'] = $_POST['eddonorMobile'];
						$dataP['contact2'] = $_POST['eddonorMobile2'];
						$dataP['email'] = $_POST['eddonorEmail']; -->
<!--  -->
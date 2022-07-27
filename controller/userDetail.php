<?php 
session_start();
require_once('../model/DBController.php');
require_once('../model/User/UserAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();

// $action = "";
// if (!empty($GET["action"])){
// 	$action = $GET["action"];
// }
	//IF DONATION BUTTON CLICKED IN DONOR PERSON TABLE
// 

		
if(isset($_POST['submitu'])){  //ajax value to submit button
	
	//ajax data passed
	if(isset($_POST['userName']) && isset($_POST['userNic']) && isset($_POST['designation']) && isset($_POST['department'])  && isset($_POST['role']) && isset($_POST['userEmail']) && isset($_POST['username']) && isset($_POST['password'])) {

		if(!empty($_POST['username']) && !empty($_POST['userName'])) {

		$myarray = array();	
			
			
			$userName = $_POST['userName'];
			$userNic = $_POST['userNic'];
			$designation = $_POST['designation'];
			$department = $_POST['department'];
			$userRole = $_POST['role'];
		 	$username = $_POST['username'];
		 	$password = $_POST['password'];
			$email = $_POST['userEmail'];
			$status = '0';
			// var_dump($userName);

			$myarray[]="('$userName','$userRole','$userNic','$designation','$department','$username','$password','$email','$status')";
		
//pass values through arrays inside array
				$person = new UserAdd();
				$result1 = $person -> addUser($myarray);

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
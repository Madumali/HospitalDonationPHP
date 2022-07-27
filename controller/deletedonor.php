<?php 
session_start();
require_once('../model/DBController.php');
require_once('../model/Donation/DonationAdd.php');
require_once('../model/Donor/DonorAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();

if(isset($_POST['del'])){

$del_id = $_POST['del'];
$persondel = new DonorAdd();
$resultdel = $persondel ->deletedonor($del_id);
if($resultdel){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
				Record successfully deleted
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			  </div>";	
} else {
	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						Not deleted
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					  </div>";
}
} else if(isset($_POST['delT'])) {

$del_id2 = $_POST['delT'];
$persondel2 = new DonorAdd();
$resultdel2 = $persondel2 ->deletedonorteam($del_id2);
if($resultdel2){
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
				Record successfully deleted
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			  </div>";	
} else {
	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						Not deleted
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					  </div>";
}
}


// delete item in donation list

if(isset($_POST['del_item'])){

	$del_itm = $_POST['del_item'];
	$itemdel = new DonationAdd();
	$resultdel = $itemdel ->deleteitem($del_itm);
	if($resultdel){
	echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
					Record successfully deleted
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				  </div>";	
	} else {
		echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
							Not deleted
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
						  </div>";
	}
	}


	if(isset($_POST['del_don2'])){

		$del_id = $_POST['del_don2'];
		$persondel = new DonorAdd();
		$resultdel3 = $persondel ->deletedonor($del_id);
		if($resultdel3){
		echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
						Record successfully deleted
						<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
					  </div>";	
		} else {
			echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
								Not deleted
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							  </div>";
		}
	}
?>
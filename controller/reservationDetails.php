<?php 
session_start();
require_once('../model/DBController.php');
// require_once('../model/Donor/TempDonorAdd.php');
// require_once('../model/Donor/DonorAdd.php');
require_once('../model/Reservation/ReserveDonation.php');

$db_handle1 = new DBController(); //connection object
$conn = $db_handle1->connectDB();

				if(isset($_POST['btnAdd'])){
					if(isset($_POST['itemName']) && isset($_POST['qty']) && isset($_POST['description']))
					{
					// if(!empty($_POST['itemName']))
						$itemName = $_POST['description'];
					
						print_r($itemName);
				// 		}else {
				// echo "<script>alert('Please Enter  Reserve Item details');</script>";

						} 
					}
						// $data['qty'] = $_POST['qty'];
						// $data['description'] = $_POST['description'];

						// var_dump($data);

				// 		if(!empty($_POST['itemName']))
				// 		{
						
				// 		$itemNamen = $_POST['itemName'];
				// 		$qtyn = $_POST['qty'];
				// 		$descriptionn = $_POST['description'];
				// 		//var_dump($data);
				// 			$scArr = array();
				// 			for($count = 0; $count<count($itemNamen);$count++)
				// 			{
				// 				$don = "test";
				// 				$code="SC";
				// 				$itemName = mysqli_real_escape_string($conn,($itemNamen[$count]));
				// 				$qty = mysqli_real_escape_string($conn,($qtyn[$count]));
				// 				$description = mysqli_real_escape_string($conn,($descriptionn[$count]));
				// 				$resDate1 = date('Y-m-d H:i:s');
				// 				$action = "reserved";	
				// 				$reDate2 = date('Y-m-d H:i:s');
				// 	$scArr[] = "('$don','$code','$itemName','$qty','$description','$resDate1','$action','$reDate2')";
				// 			}

				// 			$newItem = new ReserveDonation();
				// 			$itemNW = $newItem->addReserveItem($scArr);

				// 			} else {
				// echo "<script>alert('Please Enter  Reserve Item details');</script>";

						
					// }

					
					//alert('happening');
					// if(isset($_POST['itemName']) && isset($_POST['description']))
					// {
					// 	echo $_POST['itemName'];
					// }
				
						
						// print_r($itemName = $_POST['itemName']);
						// // echo $qty = $_POST['qty'];
						// print_r($description = $_POST['description']);

						// $itemArr = array();

						// for($count = 0; $count<count($itemName);$count++)
						// {
						// $code="SC";
						// $itemNamen = $_POST['itemName'];
						// $qtyn = $_POST['qty'];
						// $descriptionn = $_POST['description'];

						// $itemArr[]="('$code','$itemNamen','$qtynn','$descriptionn')";
						// }
						// foreach ($itemArr as $value) {
						// 	echo $value;
						// }

				// 	}
				// }
		?>

			
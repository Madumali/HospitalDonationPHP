<?php 
session_start();
require_once('../model/DBController.php');
require_once('../model/Reservation/ReserveDonation.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();


//IF RESERVATION BUTTON CLICKED IN DONOR TEAM TABLE
// if(isset($_POST['c']))
// {
// $new = $_POST['c'];
//echo $new;
// }
  //ajax value to submit button
if(isset($_POST['saveBtn'])){
		//ajax data passed
	
	if(isset($_POST['allCode']) && isset($_POST['allItemName']) && isset($_POST['allQty']) && isset($_POST['allDes']) && isset($_POST['resDate']) && isset($_POST['tablename'])  || isset($_POST['tableteamname'])  && isset($_POST['check'])){ 
	
		
		if(!empty($_POST['allCode']) && !empty($_POST['allItemName'])) {
					

			$donName = $_POST['tablename'];
			$donteam = $_POST['tableteamname'];
			$code = $_POST['allCode'];
            $itemName = $_POST['allItemName'];
            $qty = $_POST['allQty'];
            $desc = $_POST['allDes'];
            $date = $_POST['resDate'];
			$checkbox = $_POST['check'];
			var_dump($checkbox);
	
// //pass values through arrays inside array
			$itemarray=array();
			for($cnt = 0; $cnt<count($itemName);$cnt++)
			{

				
				$nw =$checkbox;
				$NameArr = $donName;
				$nameArr2 = $donteam;
				$codeArr =mysqli_real_escape_string($con,($code[$cnt]));
				$itemnameArr = mysqli_real_escape_string($con,($itemName[$cnt]));
				$qtyArr = mysqli_real_escape_string($con,($qty[$cnt]));
				$descArr = mysqli_real_escape_string($con,($desc[$cnt]));	
				$dateArr = $date;
				$resDate = date('Y-m-d H:i:s');
				$action = '0';
				if($nw == 'done')
				{
					$itemarray[]="('$nameArr2','$codeArr','$itemnameArr','$qtyArr','$descArr','$dateArr','$action','$resDate')";	
				} else if($nw == 'fail') {
				$itemarray[]="('$NameArr','$codeArr','$itemnameArr','$qtyArr','$descArr','$dateArr','$action','$resDate')";
				}
				
			}	
			
				$item = new ReserveDonation();
				$result = $item ->addReserveItem($itemarray);
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
				Record successfully Inserted
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			  </div>";
				
			}   else {
				echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
				Please Enter Reserve Item Details
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			  </div>";
					} 	
		
		}	   
				
		  
	

}	        
					// } else {


					// 	if(isset($_POST['allCode']) && isset($_POST['allCode']) && isset($_POST['allQty']) && isset($_POST['allDes']) && isset($_POST['tablename']) && isset($_POST['resDate'])) {

					// 		if(!empty($_POST['allCode']) && !empty($_POST['tablename'])) {			
					
					// 			$donName2 = $_POST['tablename'];
					// 			$code = $_POST['allCode'];
					// 			$itemName = $_POST['allItemName'];
					// 			$qty = $_POST['allQty'];
					// 			$desc = $_POST['allDes'];
					// 			$date = $_POST['resDate'];
					// 			var_dump($code);
						
					// //pass values through arrays inside array
								// $itemarray=array();
								// for($cnt = 0; $cnt<count($itemName);$cnt++)
								// {
					
									
									
								// 	$NameArr = $donName2;
								// 	$codeArr = mysqli_real_escape_string($con,($code[$cnt]));
								// 	$itemnameArr = mysqli_real_escape_string($con,($itemName[$cnt]));
								// 	$qtyArr = mysqli_real_escape_string($con,($qty[$cnt]));
								// 	$descArr = mysqli_real_escape_string($con,($desc[$cnt]));	
								// 	$dateArr = $date;
								// 	$resDate = date('Y-m-d H:i:s');
								// 	$action = '0';
								// 	$itemarray[]="('$NameArr','$codeArr','$itemnameArr','$qtyArr','$descArr','$dateArr','$action','$resDate')";
									
								// }	
								
								// 	$item = new ReserveDonation();
								// 	$result = $item ->addReserveItem($itemarray);
					//             var_dump($result);
									
				// 				} 
							
										
									
				// 			}    else {
				// 				echo "<script>alert('Please Enter Reserve Item details');</script>";
				// 					} 
						
					


				// 	}
				// }

?>

<?php 
session_start();
require_once('../model/DBController.php');
require_once('../model/Donation/DonationAdd.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();

$sqlReserve="";
$sqlReservel="";
$sql="";
//IF RESERVATION BUTTON CLICKED IN DONOR TEAM TABLE



  //ajax value to submit button
if(isset($_POST['saveBtn'])){
		//ajax data passed
	
	if(isset($_POST['allCode']) && isset($_POST['allItemName']) && isset($_POST['allQty']) && isset($_POST['allDes']) && isset($_POST['tablename'])  || isset($_POST['tableteamname'])  && isset($_POST['check'])){ 
	
		
		if(!empty($_POST['allCode']) && !empty($_POST['allItemName'])) {
					
			
			$donName = $_POST['tablename'];
			$donteam = $_POST['tableteamname'];
		
			$code = $_POST['allCode'];
            $itemName = $_POST['allItemName'];
            $qty = $_POST['allQty'];
            $desc = $_POST['allDes'];
			$username = $_SESSION['username'];
			$checkbox = $_POST['check'];
			$resDate = date('Y-m-d H:i:s');
			switch ($checkbox) {
				case 'done':
					$namedonor = $donteam;
					
					break;

					case 'fail':
						$namedonor = $donName;
					
						// break;		
			}
	
// //pass values through arrays inside array
$sql = 'INSERT INTO `donation`( `user`, `donorName`, `donationDate`, `donation_delet`) VALUES
("'.$username.'","'.$namedonor.'","'.$resDate.'","0")';
$res = mysqli_query($con, $sql);
if($res){
    
	$last_id = mysqli_insert_id($con);
			
	
			for($cnt = 0; $cnt<count($itemName);$cnt++)
			{
				$id="";
				
				$uname=$username;
				$nw =$checkbox;
				$NameArr = $donName;
				$nameArr2 = $donteam;
				$codeArr = $code[$cnt];
				$itemnameArr = $itemName[$cnt];
				$qtyArr = $qty[$cnt];
				$descArr = $desc[$cnt];	
				$resDate = date('Y-m-d H:i:s');
				$action = '0';
				$qtyout = '0';
				$delete = '0';
				switch ($nw) {
					case 'done':
						$namedonor = $nameArr2;
						
						break;

						case 'fail':
							$namedonor = $NameArr;
						
							// break;		
				}

				
		$sqlReserve .='INSERT INTO `item_table`(`donationNum`, `type_code`, `item_name`, `item_qty`, `item_description`, `receive_date`, `deleted`) VALUES 
		("'.$last_id.'", "'.$codeArr.'", "'.$itemnameArr.'", "'.$qtyArr.'", "'.$descArr.'", "'.$resDate.'", "'.$action.'");INSERT INTO `stock`(`enteredBy`,`codeid` , `codename`, `item_qty_in`, `item_qty_out`, `date`, `status`, `delete_stk`) VALUES ("'.$uname.'", "'.$codeArr.'","'.$itemnameArr.'", "'.$qtyArr.'", "'.$qtyout.'", "'.$resDate.'", "'.$action.'", "'.$delete.'");';
			
			// var_dump($sqlReserve);
			}	
			
			if($sqlReserve!='')
			{
				if(mysqli_multi_query($con,$sqlReserve))
				{
					
					echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
				Record successfully Inserted
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
			  </div>";
				}else {
					echo "error";
				}
			}		
		}	
            // var_dump($itemarray);
				
			}   else {
				echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					Please Enter Item Details
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				  </div>";
					} 	
		
		}	   
}	  



if(isset($_POST['saveBtnlist'])){
	//ajax data passed

if(isset($_POST['allCode']) && isset($_POST['allItemName']) && isset($_POST['allQty']) && isset($_POST['allDes']) && isset($_POST['defaultname']))
{ 

	
	if(!empty($_POST['allCode']) && !empty($_POST['allItemName'])) {
				

		$defnm = $_POST['defaultname'];
		$code = $_POST['allCode'];
		$itemName = $_POST['allItemName'];
		$qtyr = $_POST['allQty'];
		$desc = $_POST['allDes'];
		$username = $_SESSION['username'];
		$resDate = date('Y-m-d H:i:s');



$con = $db_handle->connectDB();
$sql = 'INSERT INTO `donation`( `user`, `donorName`, `donationDate`, `donation_delet`) VALUES
("'.$username.'","'.$defnm.'","'.$resDate.'","0")';
$res = mysqli_query($con, $sql);
if($res){
    
	$last_id = mysqli_insert_id($con);
			
		
		
		for($cnt = 0; $cnt<count($itemName);$cnt++)
		{
			
			$name = $defnm;
			$uname=$username;
			$codeArr = $code[$cnt];
			$itemnameArr = $itemName[$cnt];
			$qtyArr = $qtyr[$cnt];
			$descArr = $desc[$cnt];	
			
			$resDate = date('Y-m-d H:i:s');
			$action = '0';
			$qtyout = '0';
			$delete = '0';
			
			$sqlReservel .='INSERT INTO `item_table` (`donationNum`,`type_code`, `item_name`, `item_qty`, `item_description`, `receive_date`, `deleted`) VALUES
			( "'.$last_id.'","'.$codeArr.'", "'.$itemnameArr.'", "'.$qtyArr.'", "'.$descArr.'", "'.$resDate.'", "'.$action.'");INSERT INTO `stock`(`enteredBy`,`codeid` ,`codename`, `item_qty_in`, `item_qty_out`, `date`, `status`, `delete_stk`) VALUES("'.$uname.'", "'.$codeArr.'","'.$itemnameArr.'", "'.$qtyArr.'", "'.$qtyout.'", "'.$resDate.'", "'.$action.'", "'.$delete.'");';




			var_dump($sqlReservel);
			
			// $newsql = 'UPDATE item_sum A INNER JOIN (SELECT `type_code`, `item_name`, SUM(`item_qty`) AS `total_new` FROM `item_table` GROUP BY `item_name` ) X ON A.`item_sum_name` = X.`item_name` SET A.`total`= X.`total_new` '	;
			// $RES =  mysqli_query($con,$newsql);	
			// 'UPDATE `item_sum` SET `total`= `total`+ {$qtyArr} WHERE `item_sum_type`= $codeArr AND `item_sum_name`=$itemnameArr GROUP BY `item_name` '		
			// INSERT INTO `item_sum`( `item_sum_type`, `item_sum_name`, `total`) SELECT `type_code`, `item_name`, sum(`item_qty`) from `item_table`
		
	
		}	
		
		if($sqlReservel!='')
		{
		
			
			if(mysqli_multi_query($con,$sqlReservel))
			{
				echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
			Record successfully Inserted
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		  </div>";
			} else {
				echo "error";
			}
		}
		}	
	
	}	else {
		echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
			Please Enter Item Details
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		  </div>";
			}       
		
}	     

}


if(isset($_POST['editI']))
{

$editItem = $_POST['editI'];

$itemd = new DonationAdd();
$resultd = $itemd ->editDonItem($editItem);
if(!empty($resultd))
{
foreach ($resultd as $k) {

	?>

<form  method="post" id = "editdonor" >
			
			<div id="showitem"></div>
			
			<div class="labelfield">
				<p>
				<label for=""> Donor Name: </label>
				</p>
				<br>
				<p>
				<label for=""> Item Code: </label>
				</p>
				<br> 
				<p>
				<label for=""> Item Name: </label>
				</p> <br>
				<p>
				<label for=""> Item Qty: </label>
				</p>
				<br> 
				<p>
					<label for="">Description:</label>
				</p>
				
				
				<br>
			</div>  <!-- labelfield -->

				
			<div class="inputfield" id="ff">
			<input type="hidden"   id="editem_id" value="<?php echo $k['item_id'];?>">
				<p>
				<input type="text"  id="edit_donorName" value="<?php echo $k['donor_name'];?>" onkeyup="this.value=this.value.toUpperCase();" readonly></p>
				
				<p>
				<input type="text"  id="edit_itemCode" value="<?php echo $k['type_code'];?>" onkeyup="this.value=this.value.toUpperCase();" readonly>
                <span><select name="" id="selectcode" onchange="selectitem();">
					<option>SC</option>
					<option>SI</option>
					<option>CI</option>
					<option>GI</option>
					<option >DR</option>
					<option>FD</option>
				</select></span>
				</p>
				
				<p>
				<input type="text" id="edit_itemName" value="<?php echo $k['item_name'];?>" onkeyup="this.value=this.value.toUpperCase();">
				
				</p>
				
				
				<p>
				<input type="number"  id="edit_itemQty" value="<?php echo $k['item_qty'];?>" >
                
				</p>
				
				<p>
				<input type="text"  id="edit_description" value="<?php echo $k['item_description'];?>" onkeyup="this.value=this.value.toUpperCase();">
                
				</p>
				
				
				
		</div>  <!-- inputfield -->

		</form>
		<?php
	}

}
}




if(isset($_POST['update4']))
{
	if(isset($_POST['itemcode']) && isset($_POST['itemname']) && isset($_POST['itemqty']) && isset($_POST['description']) && isset($_POST['editem']))
	{
			$dataI['ed_item_id'] =$_POST['editem'];
			$dataI['itemCode'] = $_POST['itemcode'];
			$dataI['itemName'] = $_POST['itemname'];
			$dataI['itemQty'] = $_POST['itemqty'];
			$dataI['itemdes'] = $_POST['description'];

				$personU = new DonationAdd();
				$resultU = $personU ->updateItem($dataI);
			
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


// if(isset($_POST['saveBtnlist']) || isset($_POST['saveBtn'])){

// 	$check = 'SELECT * FROM item_sum';
// 	$result =  mysqli_query($con,$check);

// 	while($row=mysqli_fetch_assoc($result))
// 	{
// 		if(!$row)
// 		{
// 			$news = 'INSERT INTO `item_sum`(`item_sum_type`, `item_sum_name`, `total`) SELECT `type_code`, `item_name`, SUM(`item_qty`) FROM `item_table` GROUP BY `item_name`';
// 			$ress = mysqli_query($con,$news);
// 		} else {
// 			$qty['qty'] = $_POST['allQty'];
// 			$data['name'] = $_POST['allItemName'];
// 			$newsql = "UPDATE `item_sum`A INNER JOIN (SELECT `type_code`, `item_name`, SUM(`item_qty`) AS `total_new` FROM `item_table` GROUP BY `item_name` ) X ON A.`item_sum_name` = X.`item_name` SET A.`total`= X.`total_new"	;
// 			$RES =  mysqli_query($con,$newsql);
// 		}
// 	}


	
	
// $con = $db_handle->connectDB();	
// }

if(isset($_POST['saveBtnlist'])){
	//ajax data passed

if(isset($_POST['allCode']) && isset($_POST['allItemName']) && isset($_POST['allQty']) )
{ 



$nameitm = $_POST['allItemName'];
$qtyitm = $_POST['allQty'];

for($cnt = 0; $cnt<count($nameitm);$cnt++)
{

$qtyar = $qtyitm[$cnt];
$namear = $nameitm[$cnt];

$query = 'INSERT INTO `item_name`(`code`, `stock_in`) VALUES
("'.$namear.'", "'.$qtyar.'") ON DUPLICATE KEY UPDATE stock_in = VALUES (stock_in + "'.$qtyar.'" );';


}

// mysqli_query($con, $query);
	 
		
		// $code = $_POST['allCode'];
		// $itemName = $_POST['allItemName'];
		// $qtyr = $_POST['allQty'];


		// $updateqry = "UPDATE item_name SET stock_in = stock_in + {$qtyr} WHERE code = $itemName ; ";
		// var_dump($updateqry);
		// $res = mysqli_query($con,$updateqry);
		
	
}
}


?>

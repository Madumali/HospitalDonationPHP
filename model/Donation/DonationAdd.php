<?php 
require_once('model/DBcontroller.php');

class DonationAdd{

	private $db_handle;


	function __construct(){
		$this->db_handle = new DBcontroller();
		

	}


function updateItem($dataI)
{

	$con = $this->db_handle->connectDB();
	$upda = "UPDATE `item_table` SET `type_code`='$dataI[itemCode]', `item_name`='$dataI[itemName]', `item_qty`='$dataI[itemQty]', `item_description`='$dataI[itemdes]'  WHERE `item_id`='$dataI[ed_item_id]' AND `deleted`= 0  ";
	$queryUa =mysqli_query($con,$upda);

 if($queryUa){

	 return $queryUa;
 } 


}
	
		// LIMIT {$start},{$rows_per_page}
		// $start,$rows_per_page

		function editDonItem($id){
		
			$con = $this->db_handle->connectDB();
				$arrays= array();
				$sqld = "SELECT * FROM `item_table` WHERE `item_id`='$id' LIMIT 1 ";
		
				$result = mysqli_query($con,$sqld);	
				
						while($row=mysqli_fetch_assoc($result))
							{
							$arrays[]=$row;
		
							}
						
				return $arrays;
		}

	

// function to get item type into select box
// function addDonateItem($fieldsArrayR){
	
// 	$sqlReserve="";
	
// 	$sqlReserve .="INSERT INTO `item_table` (`item_id`,`added_by`, `donor_name`, `type_code`, `item_name`, `item_qty`, `item_description`, `receive_date`, `deleted`) VALUES ";
// 	$sqlReserve .=implode(',' ,$fieldsArrayR);
// 	//echo $sqlD;
 	
//  	$query2 =$this->db_handle->runMysqlQuery($sqlReserve);

//  	if($query2){

//  		return $query2;
//  	}
// }



function deleteitem($delid)
	{

		$con = $this->db_handle->connectDB();
		$del = "UPDATE `item_table` a INNER JOIN item_name b ON a.item_name = b.code INNER JOIN stock c ON b.code = c.code  SET a.`deleted`= 1, c.delete_stk = 1   WHERE a.`item_id`='$delid' ";
		$queryU =mysqli_query($con,$del);

 		if($queryU){

 		return $queryU;
 	} 

	}




	

}




?>

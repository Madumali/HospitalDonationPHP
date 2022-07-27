<?php 
require_once('../model/DBcontroller.php');

class ReserveDonation{

	private $db_handle;


	function __construct(){
		$this->db_handle = new DBcontroller();
		

	}

// function to get item type into select box
function addReserveItem($fieldsArrayR){

	$sqlReserve="";
	$sqlReserve .="INSERT INTO `temp_item_table`(`temp_donor_name`, `code`, `item_name`, `item_qty`, `item_description`, `reserve_date`, `action`, `resrved_in`) VALUES ";
	$sqlReserve .=implode(',' ,$fieldsArrayR);
	//echo $sqlD;
 	
 	$query2 =$this->db_handle->runMysqlQuery($sqlReserve);

 	if($query2){

 		return $query2;
 	}
	
	

}



}

?>
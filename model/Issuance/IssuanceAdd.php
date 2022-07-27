<?php 
require_once('../model/DBcontroller.php');

class IssuanceAdd{

	private $db_handle;


	function __construct(){
		$this->db_handle = new DBcontroller();
		

	}
    function Issueadd($fieldsArray1){
    $sql ="";
	$sql .="INSERT INTO `issuance`(`issue_type`,`issue_item`, `issue_itemqty`, `issue_dep`, `to_whom`, `issue_date`, `issue_delet`) VALUES ";
	$sql .=implode(',' ,$fieldsArray1);
	//echo $sqlD;
 	
 	$query2 =$this->db_handle->runMysqlQuery($sql);

 	if($query2){

 		return $query2;
 	}
    }


    function updateIssueview($data){
		// var_dump($data);
		$con = $this->db_handle->connectDB();
		

 	if($queryU){

 		return $queryU;
 	} 
	}


}
    ?>
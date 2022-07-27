<?php 
require_once('../model/DBcontroller.php');

class DonorAdd{

	private $db_handle;


	function __construct(){
		$this->db_handle = new DBcontroller();
		

	}

	function getAllDonors(){
		$con = $this->db_handle->connectDB();
			$arrays= array();
			$sqlds = "SELECT * FROM `donor_all`WHERE   (`donor_type`='Person' OR `donor_type`='team') AND  `delete_status`=0  ORDER BY`donor_id` DESC  ";
	
			$result = mysqli_query($con,$sqlds);	
			
					while($row=mysqli_fetch_assoc($result))
						{
						$arrays[]=$row;
	
						}
					
			return $arrays;
	}

	function updateDonor($data){
		
		$con = $this->db_handle->connectDB();
		$upda = "UPDATE `donor_all` SET `donor_name`='$data[donorName]', `national_id`='$data[donorNic]', `address_line1`='$data[addressL1]', `address_line2`='$data[addressL2]', `contact_no`='$data[contact1]', `contact_no2`='$data[contact2]', `email`='$data[email]'  WHERE `donor_id`='$data[edid]' AND `delete_status`= 0  ";
		$queryUa =mysqli_query($con,$upda);

 	if($queryUa){

 		return $queryUa;
 	} 
	}
	function updateDonorTeam($data){
		
		$con = $this->db_handle->connectDB();
		$upd = "UPDATE `donor_team` SET `membername`='$data[donorName]', `national_idt`='$data[donorNic]', `address_line1t`='$data[addressL1]', `address_line2t`='$data[addressL2]', `contact_not`='$data[contact1]', `emailt`='$data[email]'  WHERE `teamid`='$data[edid]' AND `deletestatus`= 0  ";
		$queryU =mysqli_query($con,$upd);

 	if($queryU){

 		return $queryU;
 	} 
	}

	function updateDonorTeamDetail($data){
		// var_dump($data);
		$con = $this->db_handle->connectDB();
		$upd = "UPDATE `donor_all` SET `donor_name`='$data[teamName]', `address_line1`='$data[addressL1]',  `contact_no`='$data[contact1]', `email`='$data[email]'  WHERE `donor_id`='$data[edid]' AND `delete_status`= 0  ";
		$queryU =mysqli_query($con,$upd);

 	if($queryU){

 		return $queryU;
 	} 
	}



	function editDonorPersonA($editId)
{
	$con = $this->db_handle->connectDB();
	$editArr = array();
	//$data = "";
	$data= "SELECT * FROM `donor_team` WHERE `teamid` = '$editId'  AND `deletestatus`= 0  ";
	$resultPd = mysqli_query($con,$data);
		
				while($rowPd=mysqli_fetch_assoc($resultPd))
					{
					$editArr[]=$rowPd;

					}
				
		return $editArr;
}

function editDonorPersonAP($editId,$type)
{
	$con = $this->db_handle->connectDB();
	$editArr = array();
	//$data = "";
	$data= "SELECT * FROM `donor_all` WHERE `donor_id` = '$editId' AND `donor_type` = '$type' AND `delete_status`= 0  ";
	$resultPd = mysqli_query($con,$data);
		
				while($rowPd=mysqli_fetch_assoc($resultPd))
					{
					$editArr[]=$rowPd;

					}
				
		return $editArr;
}



function listDonorPersonA($editId)
{
	$con = $this->db_handle->connectDB();
	$editArr = array();
	//$data = "";
	$data= "SELECT * FROM `donor_all` WHERE `donor_id`='$editId' ";
	$resultPd = mysqli_query($con,$data);
		
				while($rowPd=mysqli_fetch_assoc($resultPd))
					{
					$editArr[]=$rowPd;

					}
				
		return $editArr;
}

function listDonorPersonAA($editId)
{
	$con = $this->db_handle->connectDB();
	$editArr = array();
	//$data = "";
	$data= "SELECT * FROM `donor_all` WHERE `donor_id` = '$editId' AND `delete_status`= 0 ORDER BY `donor_id` DESC LIMIT 1 ";
	$resultPd = mysqli_query($con,$data);
		
				while($rowPd=mysqli_fetch_assoc($resultPd))
					{
					$editArr[]=$rowPd;

					}
				
		return $editArr;
}

// INNER JOIN `donor_all` ON `donor_all`.`donor_name` = `donor_team`.`donor_name`

	function getDonor($name){
		$con = $this->db_handle->connectDB();
		$array= array();
		$sqld = "SELECT `teamid`,`title`, `membername`, `national_idt`, `address_line1t`, `address_line2t`, `contact_not`, `emailt`, `reg_datet`, `deletestatus` FROM `donor_team` WHERE `donor_name` = $name AND deletestatus = 0 ORDER BY `teamid`";
		$result = mysqli_query($con,$sqld);	
		while($row=mysqli_fetch_assoc($result))
					{
						
					$array[]=$row;
					}
				
		return $array;
		}//this function display donor team name 
	function getDonorTeam($type){
		$con = $this->db_handle->connectDB();
		$array= array();
		$sqld = "SELECT * FROM `donor_all` WHERE`donor_type`='$type'  AND `delete_status`= 0 ORDER BY `donor_id` DESC LIMIT 1 ";

		$result = mysqli_query($con,$sqld);	
		
				while($row=mysqli_fetch_assoc($result))
					{
					$array[]=$row;

					}
				
		return $array;
		}


		// IN(
		// 	SELECT `don_team_name`FROM `donor` WHERE`donor_type`='$type' AND `status`= 0  GROUP BY `don_team_name` HAVING COUNT(*)>=1
		// 	)


function getDonorPerson(){
		$con = $this->db_handle->connectDB();
		$arrayP= array();
		$sqlP = "SELECT * FROM `donor_all` WHERE `donor_type`='person' AND `delete_status`= 0  ORDER BY`donor_id`DESC LIMIT 1 ";
		$resultP = mysqli_query($con,$sqlP);

//result =$this->db_handle->runMysqlQuery($sql);	
		
				while($rowP=mysqli_fetch_assoc($resultP))
					{
					$arrayP[]=$rowP;

					}
				
		return $arrayP;
		}


	//this function will add  donor teams when click on add donation
function addDonor($fieldsArray1){
	$sqlD="";
	$sqlD .="INSERT INTO `donor_all`(`donor_id`, `donor_type`, `title`, `national_id`, `donor_name`, `address_line1`, `address_line2`, `email`, `contact_no`, `contact_no2`, `reg_date`, `delete_status`) VALUES  ";
	$sqlD .=implode(',' ,$fieldsArray1);
	//echo $sqlD;
 	
 	$query2 =$this->db_handle->runMysqlQuery($sqlD);

 	if($query2){

 		return $query2;
 	}
	
	}

	function addDonorTeam($fieldsArray1, $fieldsArray2){
		$sqlD="";
		$sqlD .="INSERT INTO `donor_all`( `donor_type`, `title`, `national_id`, `donor_name`, `address_line1`, `email`, `contact_no`,  `reg_date`, `delete_status`) VALUES  ";
		$sqlD .=implode(',' ,$fieldsArray1); "INSERT INTO `donor_team`( `donor_name`, `title`, `membername`, `national_idt`, `address_line1t`, `address_line2t`, `contact_not`, `emailt`, `reg_datet`, `deletestatus`) VALUES";
		$sqlD .=implode(',' ,$fieldsArray2);
		//echo $sqlD;
		 
		 $query2 =$this->db_handle->runMysqlQuery($sqlD);
	
		 if($query2){
	
			 return $query2;
		 }
		
		}

	function deletedonor($delid)
	{

		$con = $this->db_handle->connectDB();
		$del = "UPDATE `donor_all` SET `delete_status`= 1   WHERE `donor_id`='$delid'  ";
		$queryU =mysqli_query($con,$del);

 		if($queryU){

 		return $queryU;
 	} 

	}

	function deletedonorteam($delid)
	{

		$con = $this->db_handle->connectDB();
		$del = "UPDATE `donor_team` SET `deletestatus`= 1   WHERE `teamid`='$delid'  ";
		$queryU =mysqli_query($con,$del);

 		if($queryU){

 		return $queryU;
 	} 

	}

// function getStudentinClass($nic,$type){
// 	$con = $this->db_handle->connectDB();
// $sql = "SELECT * FROM `donor` WHERE `donor_type`='$type' AND 'national_id'='$nic' ORDER BY`donor_id`DESC ";
// $list ='<ul>';
// $result = mysqli_query($con,$sql);;
// while($row = $result->fetch_assoc()){
// $list .= "<li>". $row["name"]. "</li>";
// }
// $list = $list . "</ul>";
// echo $list;
// }

}
?>
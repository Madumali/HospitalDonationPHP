<?php 
require_once('../model/DBcontroller.php');

class TempDonorAdd{

	private $db_handle;


	function __construct(){
		$this->db_handle = new DBcontroller();
		

	}

	function editDonorPerson($editId,$type)
{
	$con = $this->db_handle->connectDB();
	$editArr = array();
	//$data = "";
	$data= "SELECT * FROM `tempdonor` WHERE `donor_id` = '$editId' AND `donor_type` = '$type' ";
	$resultPd = mysqli_query($con,$data);
		
				while($rowPd=mysqli_fetch_assoc($resultPd))
					{
					$editArr[]=$rowPd;

					}
				
		return $editArr;
}


	function membernum($ed){

	$con = $this->db_handle->connectDB();
	$editArrE = '';
	//$data = "";
	$data= "SELECT `don_team_name` FROM `tempdonor` , sum(`don_team_name`) as count GROUP BY `don_team_name` WHERE `donor_id` = '$ed'";
	$resultd = mysqli_query($con,$data);
	if($resultd){
		if(mysqli_num_rows($resultd)>=0){
			while ($row=mysqli_fetch_assoc($resultd)) {
				$editArrE[]=$row;
			}
		}
	}
		return $editArrE;
	}












	//this function display temporary donor for reservation in reservation fieldset
	function getTempDonor($type){
		$con = $this->db_handle->connectDB();
		$array= array();
		$sql = "SELECT * FROM `tempdonor` WHERE `don_team_name`= (SELECT `don_team_name`FROM `tempdonor` WHERE`donor_type`='$type' GROUP BY `don_team_name` HAVING COUNT(`don_team_name`)>=1 ORDER BY `donor_id` DESC LIMIT 1)  ORDER BY`donor_id`DESC  ";

		$result = mysqli_query($con,$sql);	
		
				while($row=mysqli_fetch_assoc($result))
					{
					$array[]=$row;

					}
				
		return $array;
		}//this function display temporary donor team name for reservation in reservation fieldset
	function getTempDonorTeam($type){
		$con = $this->db_handle->connectDB();
		$array= array();
		$sql = "SELECT * FROM `tempdonor` WHERE `don_team_name` IN(
SELECT `don_team_name`FROM `tempdonor` WHERE`donor_type`='$type' GROUP BY `don_team_name` HAVING COUNT(*)>=1
)ORDER BY `donor_id` DESC LIMIT 1";

		$result = mysqli_query($con,$sql);	
		
				while($row=mysqli_fetch_assoc($result))
					{
					$array[]=$row;

					}
				
		return $array;
		}





function getTDonorPerson(){
		$con = $this->db_handle->connectDB();
		$arrayP= array();
		$sqlP = "SELECT * FROM `tempdonor` WHERE `donor_type`='PERSON' ORDER BY`donor_id`DESC LIMIT 1 ";
		$resultP = mysqli_query($con,$sqlP);

//result =$this->db_handle->runMysqlQuery($sql);	
		
				while($rowP=mysqli_fetch_assoc($resultP))
					{
					$arrayP[]=$rowP;

					}
				
		return $arrayP;
		}




	//this function will add temporary donor teams when click on reserve
function addTempDonor($fieldsArray){
	$sql="";
	$sql .="INSERT INTO `tempdonor`( `donor_type`, `don_team_name`, `member_name`, `national_id`, `address_line1`, `address_line2`, `contact_no`, `contact_no2`, `email`, `reg_date`, `status`) VALUES ";
	$sql .=implode(',' ,$fieldsArray);
	//echo $sql;

 	$query =$this->db_handle->runMysqlQuery($sql);
 	if($query){

 		return $query;
 	}
	}


}





 ?>



<!-- SELECT * FROM `donor` WHERE `don_team_name` IN(
SELECT `don_team_name`FROM `donor` GROUP BY `don_team_name` HAVING COUNT(*)>1
) -->
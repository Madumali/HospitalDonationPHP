<?php 
require_once('model/DBcontroller.php');

class LoginCheck{

	private $db_handle;


	function __construct(){
		$this->db_handle = new DBcontroller();
		

	}


function getuser($username,$user_password){
		$con = $this->db_handle->connectDB();
		$arrayUser= array();
		$sqlUser = "SELECT * FROM `user` WHERE `username`='$username' AND `user_password` = '$user_password' LIMIT 1";
		$resultUser = mysqli_query($con,$sqlUser);

//result =$this->db_handle->runMysqlQuery($sql);	
		
				while($rowU=mysqli_fetch_assoc($resultUser))
					{
					$arrayUser[]=$rowU;

					}
				
		return $arrayUser;
		}
    }
    ?>
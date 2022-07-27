<?php 
require_once('../model/DBcontroller.php');

class UserAdd{

	private $db_handle;


	function __construct(){
		$this->db_handle = new DBcontroller();
		

	}
    function addUser($fieldsArray){
        $sqlD="";
        $sqlD .="INSERT INTO `user`(`user_full_name`, `user_role`, `user_nic`, `designation`, `user_department`, `username`, `user_password`, `user_email`, `deleted_user`) VALUES ";
        $sqlD .=implode(',' ,$fieldsArray);
        //echo $sqlD;
         
         $query2 =$this->db_handle->runMysqlQuery($sqlD);
    
         if($query2){
    
             return $query2;
         }
        
        }
    }
    ?>
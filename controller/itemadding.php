<?php 
session_start();
require_once('../model/DBController.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();

$newcode='';
$type='';
		
if(isset($_POST['buttonid'])){  //ajax value to submit button
    if(isset($_POST['name']) && isset($_POST['category']) ) {

		if(!empty($_POST['name']) && isset($_POST['category']) ) {	
		   $name =$_POST['name'];
           $category = $_POST['category'];
           $del = 0;
			
$sqladd = "INSERT INTO `item_name`(`type_cd`, `itemname`, `delete_name`) VALUES ('$category', '$name', '$del')";
$res = mysqli_query($con, $sqladd);
// var_dump($sqladd);
if($res){
    
$last_id = mysqli_insert_id($con);

if($last_id)
{
    if($category=='SC')
    {
        $code = "SC000";

    } elseif ($category == 'SI') {
        $code = "SI000";
    } elseif ($category == 'CI') {
        $code  = "CI000";
    }elseif ($category == 'DR') {
        $code = "DR000";
    }elseif ($category == 'GI') {
        $code = "GI000";
    }elseif ($category == 'FD') {
        $code = "FD000";
    }

    $typecode = $code.$last_id;
    $query = "UPDATE item_name SET code = '".$typecode."' WHERE id = '".$last_id."'";
    $result = mysqli_query($con, $query);
}



echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
								Data Added Successfully!
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							  </div>";
                              

}
			} else {
				echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
								Please Enter Details!
								<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							  </div>";
			} 
            
					
		}
		
	} 

<?php
session_start();
require_once('../model/DBController.php');
require_once('../model/Login/LoginCheck.php');

$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();

if (isset($_POST['btn'])){
	// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
	$username = $_POST['username'];
	$password = $_POST['password'];
	// $uname = strip_tags(mysqli_real_escape_string($con,trim($username)));
	// $upassword = strip_tags(mysqli_real_escape_string($con,trim($password)));
	
				$Display = new LoginCheck();
				$resultShow = $Display -> getuser($username,$password);
				
				if(!empty($resultShow)){
				foreach($resultShow as $rowR){
					$id=$rowR['uid'];
					$pass = $rowR['user_password'];
					$uname = $rowR['username'];
					$_SESSION['userId']= $rowR['uid'];
					$_SESSION['username']= $rowR['user_full_name'];
					$_SESSION['usertype']= $rowR['user_role'];
							}
							if($uname==$username && $pass==$password)
							{
								
								echo "<script>window.location='/HospitalDonation/donor.php';</script>";
							
							} 
									

				}else{
					echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
					Username / Password is not recognized
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				  </div>";
						}
	}
	
// 	if($row=mysqli_fetch_array($resultset))
//  {
// 	if($row['user_password']==$user_password){
//   $_SESSION['user_name']=$row['username'];
//   echo "success";
//  	}
//  	else
//  	{
//   echo "fail";
//  	}
// }
// 	while($row=mysqli_fetch_array($resultset))
//  {
// 	$array[]=$row;
	
  
	
// 	if(!empty($row))
// 				foreach($row as $rowR){
// 					$_SESSION['user_name']=$rowR['username'];
// 					$id=$rowR['uid'];}
//  }
 
	
	// if($row['user_password']==$user_password){				
	// 	echo "ok";
	// 	$_SESSION['user_session'] = $row['uid'];
	// } else {				
	// 	echo "email or password does not exist."; // wrong details 
	// }
			

?>

 <!-- if ($_SERVER[‘REQUEST_METHOD’] == ‘POST’) {

$email = $_POST[‘email’];
$password = $_POST[‘password ‘]
$email = strip_tags(mysqli_real_escape_string($db->link,trim($email)));
$password = strip_tags(mysqli_real_escape_string($db->link,trim($password)));

$query = “SELECT * FROM tbl_user WHERE email = ‘$email ‘“;
$result = $db->select($query);

if(mysqli_num_rows($result) > 0) {

//Now email is matched we also need to verify password

$data = mysqli_fetch_array($result);
$password_hash = $data[‘password’];
if ( password_verify($password ,$password_hash)) { 

//Make sure when you will create registration mechanism where you have to insert password using password_hash() function .
//If we are here it means password is verified , So we can redirect user

Session::set(“userId”, $data[‘id’]); 
  //catching user id by Session
	echo “window.location = ‘index.php’;”; //Use script tag and close also
  }
else{
	echo “Password is not matched”;
  }
}
else{
	echo “alert(‘Email is not matched’);”; //Use script tag and close also
 }
} -->
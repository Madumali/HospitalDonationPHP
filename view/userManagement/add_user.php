<?php 

// require_once('../../model/Reservation/ReserveDonation.php');
require_once('../../header.php');
require_once('../../model/DBController.php');


$db_handle = new DBController(); //connection object
$con = $db_handle->connectDB();



 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users Management</title>
	<link rel="stylesheet" href="../../assets/css/bootstrap.css"> <!--bootstrap css-->
	<link rel="stylesheet" href="../../assets/DataTables/datatables.min.css"> <!--datatables css for datepicker-->
	<link rel="stylesheet" href="../../assets/css/jquery-ui.min.css">  <!--jquery ui css-->
	<link rel="stylesheet" href="../../assets/css/menu.css">  <!-- main css -->
	<link rel="stylesheet" href="../../fontawesome/css/all.css">   <!-- fontawesome css -->
	<script src="../../assets/js/jquery-1.12.0.min.js" type="text/javascript"></script>  <!--jquery min js-->
	<script src="../../assets/js/bootstrap.js"></script> <!--bootstrap js-->
	<script src="../../assets/DataTables/datatables.min.js"></script>  <!--datatables js-->
	<script src="../../assets/js/jquery-ui.min.js"></script>  <!--jquery ui min js-->
	
</head>
<body>
	<header>
	 <!-- <div class="appname"> User Management </div>    appname -->	

	</header>
	<div class="wrap clearfix">
		<!-- <div class="COMMON clearfix"> -->
	
	<div class="userinfo" id="" style="display:block ;" >
		<form  method="post" id="adduser">
			<div id="resultuser"></div>
			
		<fieldset class="dperson">
			<legend>User Information</legend>

			<div class="labelfield">
			<p>
				<label > Name: </label>
				</p>
				<br>
				<p>
				<label > NIC: </label>
				</p>
				<br> 
				<p>
				<label> Department:</label>
				</p> <br>
				<p>
				<label> Designation:</label>
				</p> <br>
				<p>
				<label> Email Address:</label>
				</p>
				<br> 
				<p>
				<label> User Name:</label>
				</p>
				<br>
				<p>
				<label> Password: </label>
				</p>
				<br>
				
				<br>
			</div>  <!-- labelfield -->

				
			<div class="inputfield" id="person">
				<p>
				<input type="text" name="user_name" placeholder="Enter User Name" id="userName" onkeyup="this.value=this.value.toUpperCase();">
				</p>
				
				<p>
				<input type="text" name="user_nic" placeholder="Enter National Identity " id="userNic" onkeyup="this.value=this.value.toUpperCase();">
				<span id="nicU"></span>
				</p>

				<p>
				<select name="department" id="department">
					<option value="">-Select-</option>
					<?php
							 
			 				$query="SELECT * FROM department ORDER BY dep_id ";
							$result=mysqli_query($con,$query);

								if($result){
								while($row = mysqli_fetch_array($result)){
									$did=$row['dep_id'];
									$depname =$row['dep_name'];
									
				
								echo "<option value=$did> $depname</br></option>";
			
										}
										}	
                                        ?>
					
				</select>
				</p>
				
				<p>
				<input type="text" name="user_designation" placeholder="Enter Designation" id="designation" onkeyup="this.value=this.value.toUpperCase();">
				</p>
				
			
				
				<p>
				<input type="email" name="user_email" placeholder="Enter Email" id="userEmail" onkeyup="this.value=this.value.toUpperCase();">
				<span id = "emailMsgU"></span>
				</p>
					
				
				<p>
				<input type="text" name="user_name" placeholder="Enter Username" id="username" onkeyup="this.value=this.value.toUpperCase();">
				<span id = "username"></span>
				</p>
				
				<p>
				<input type="password" name="user_password" placeholder="Enter Password" id="password" onkeyup="this.value=this.value.toUpperCase();">
				<span id = "password"></span>
				</p>
				<p>
				<button type="submit" name="submit1" class="sub btn-outline-success" id="subUser" ><i class="fas fa-user-plus"></i> Add User</button>
					
					
					<!-- <i class="fas fa-clipboard-list"></i>
					<i class="fas fa-pen"></i> -->
					<!-- <i class="fas fa-list"></i> -->
					<!-- <i class="fas fa-plus-circle"></i> -->
					
					
					
				</p>
				
		</div>  <!-- inputfield -->

		</fieldset>
		</form>
	</div> 
</div>
</body>
</html>

<script src="../../assets/js/scriptD.js"></script> 
<script src="../../assets/js/script2.js"></script> 